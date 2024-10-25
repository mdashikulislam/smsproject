<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class FreeSms extends Component
{
    public function render()
    {
        return view('livewire.frontend.free-sms')->layout(FRONTEND_LAYOUT,['seoTitle' => 'Free Sms']);
    }
}
