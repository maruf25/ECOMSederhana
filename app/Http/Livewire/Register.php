<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register')->layoutData(['title' => 'Register']);
    }

    protected $rules = [
        "name" => ['required'],
        "email" => ['required', 'email', 'unique:users'],
        "password" => ['required', 'confirmed'],
    ];

    public function registerUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $user->assignRole('user');
        event(new Registered($user));

        session()->flash('success', 'Registration Success, Please Login');

        return redirect('/login');
    }
}
