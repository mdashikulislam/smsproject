<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $pageTitle = "Register";
    public function render()
    {
        return view('livewire.auth.register')->layout(FRONTEND_LAYOUT,['title' => $this->pageTitle]);
    }
}
