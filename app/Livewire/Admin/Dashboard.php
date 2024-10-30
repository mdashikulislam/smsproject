<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout(ADMIN_LAYOUT,['seoTitle'=>'Dashboard'])]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
