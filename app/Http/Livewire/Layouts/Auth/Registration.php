<?php

namespace App\Http\Livewire\Layouts\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Registration extends Component
{
    use WithFileUploads;

    public $nama;
    public $gender;
    public $email;
    public $alamat;
    public $no_telepon;
    public $tanggal_lahir;
    public $password;
    public $password_confirmation;
    public $media;
    public function registration(){
        $messages = [
        'required' => 'Input :attribute tidak boleh kosong.',
        'min' => 'Input :attribute harus lebih dari 3 karakter',
        'email' => ':attribute tidak valid',
        'confirmed' => 'konfirmasi password tidak valid'
        ];

        $rules = [
            'nama' => 'required',
            'gender' => 'required|max:1',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12',
            'tanggal_lahir' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'media' => 'required|image|max:2048',
        ];
        
        $payload = $this->validate($rules, $messages);
        $payload['media'] = $this->media->store('img/User', ['disk' => 'public_uploads']);

        $payload['password'] = Hash::make($payload['password']);
        $payload['role'] = 2;
        
        $user = User::create($payload);

        if(!$user){
            return session()->flash('regError', 'Pendaftaran gagal, coba ulangi');
        }

        return session()->flash('success', 'Pendaftaran berhasil');
    }
    public function render()
    {
        return view('livewire.layouts.auth.registration');
    }
}
