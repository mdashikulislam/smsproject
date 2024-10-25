<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public $seoTitle;

    public function mount()
    {
        $this->seoTitle = "Register";
    }

    public function render()
    {
        return view('livewire.auth.register', ['seoTitle' => $this->seoTitle]);
    }
}
