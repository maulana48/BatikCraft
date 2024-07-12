<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use App\Models\{User, Cart};

class Profile extends Component
{
    public $url;
    public $pageName;
    public $title;
    public $user;
    public $name;
    public $gender;
    public $email;
    public $address;
    public $phone_number;
    public $birth_date;
    public $password;
    public $password_confirmation;
    public $profile_picture;

    public function mount($user = null)
    {
        $this->url = 'profile';
        $this->pageName = "Profile";
        $this->user = $user;
        $this->title = 'Profile';

        $this->name = $user->name;
        $this->gender = $user->gender;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->phone_number = $user->phone_number;
        $this->birth_date = $user->birth_date;
        $this->profile_picture = null;
    }

    public function update_profile()
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
            'password' => 'confirmed',
            'password_confirmation' => 'required_with:password',
            // 'profile_picture' => 'sometimes|mimes:jpeg,jpg,png,gif|max:2048',
            'profile_picture' => 'nullable|image|max:2048',
        ];

        $payload = $this->validate($rules, $messages);
        if ($payload['password']) {
            $payload['password'] = bcrypt($payload['password']);
        } else {
            unset($payload['password']);
            unset($payload['password_confirmation']);
        }

        if ($payload['profile_picture']) {
            $payload['profile_picture'] = '/storage/' . $this->profile_picture->store('img/User');
        } else {
            unset($payload['profile_picture']);
        }

        $payload['role'] = 2;

        $user = User::query()->where('id', $this->user->id)->update($payload);

        if (!$user) {
            return session()->flash('updateProfileError', 'Gagal mengupdate profil, coba ulangi');
        }

        return session()->flash('success', 'Berhasil mengupdate profile');
    }

    public function render()
    {
        return view('livewire.layouts.profile');
    }
}
