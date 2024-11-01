<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Pricing extends Component
{
    public function render()
    {
        return view('livewire.frontend.pricing')->layout(FRONTEND_LAYOUT,['seoTitle' => 'Pricing']);
    }
}
