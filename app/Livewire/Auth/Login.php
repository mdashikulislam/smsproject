<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => ['required','email','string'],
        'password' => ['required','min:8'],
    ];


    public function login()
    {
        $this->validate();

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
