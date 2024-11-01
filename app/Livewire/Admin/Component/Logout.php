<?php

namespace App\Livewire\Admin\Component;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();
        $this->redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.admin.component.logout');
    }
}
