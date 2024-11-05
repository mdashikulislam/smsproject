<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cms extends Component
{
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Cms')]
    public function render()
    {
        return view('livewire.admin.cms');
    }
}
