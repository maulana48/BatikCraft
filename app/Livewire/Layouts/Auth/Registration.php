<?php

namespace App\Livewire\Layouts\Auth;

use Livewire\Component;
use App\Models\{User, Cart};
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    public $url;
    public $name = "user test";
    public $gender = "M";
    public $email = "usertest@gmail.com";
    public $address = "Jl. Test";
    public $phone_number = "081234567890";
    public $birth_date = "2000-01-01";
    public $password = "usertest";
    public $password_confirmation = "usertest";
    public $profile_picture;

    public function mount()
    {
        $this->url = 'auth.registration';
    }
    public function registration()
    {
        $messages = [
            'required' => 'Input :attribute tidak boleh kosong.',
            'min' => 'Input :attribute harus lebih dari 3 karakter',
            'email' => ':attribute tidak valid',
            'confirmed' => 'konfirmasi password tidak valid'
        ];

        $rules = [
            'name' => 'required',
            'gender' => 'required|max:1',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required|min:12',
            'birth_date' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'profile_picture' => 'required|image|max:2048',
        ];

        $payload = $this->validate($rules, $messages);
        $payload['profile_picture'] = $this->profile_picture->store('img/User', ['disk' => 'public_uploads']);

        $payload['role'] = 2;

        $user = User::query()->where('email', $payload['email'])->first();

        if ($user) {
            dd($user);
            return session()->flash('regError', 'Email ini sudah terpakai');
        }

        $user = User::create($payload);
        $keranjang = Cart::create(['user_id' => $user->id]);

        if (!$user) {
            dd($user);
            return session()->flash('regError', 'Pendaftaran gagal, coba ulangi');
        }

        session()->flash('success', 'Pendaftaran berhasil');

        $this->dispatch('login');
        return;
    }

    public function render()
    {
        return view('livewire.layouts.' . $this->url);
    }
}
