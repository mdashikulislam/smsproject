<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout()
    {
        auth()->logout();
        return $this->redirect(route('login'), navigate: true);
    }
}
