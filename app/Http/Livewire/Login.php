<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.login')->layoutData(['title' => "Login Page"]);
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];
    public function loginUser()
    {
        $this->validate();
        if (Auth::attempt($this->only(['email', 'password']))) {
            session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('failed', 'login failed');
    }
}
