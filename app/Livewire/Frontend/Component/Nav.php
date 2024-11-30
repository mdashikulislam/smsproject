<?php

namespace App\Livewire\Frontend\Component;

use Livewire\Component;

class Nav extends Component
{
    public $user;
    protected $listeners = ['balanceUpdated' => 'updateBalance'];
    public function mount()
    {
        $this->user = auth()->user();
    }
    public function updateBalance()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.frontend.component.nav');
    }
}
