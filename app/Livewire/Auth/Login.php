<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $pageTitle = 'Login';
    public $email;
    public $password;
    public $remember_me;
    protected $rules = [
        'email' => ['required','email','string'],
        'password' => ['required','min:8'],
    ];

    public function login()
    {
        $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            return $this->redirect(route('admin.dashboard'), navigate: true);
        }
        else{
            return $this->addError('email', trans('auth.failed'));
        }
    }
    public function render()
    {
        return view('livewire.auth.login')->layout(FRONTEND_LAYOUT,['title' => $this->pageTitle]);
    }
}
