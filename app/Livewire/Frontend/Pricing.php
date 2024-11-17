<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Pricing extends Component
{
    public $seo = [];
    public function mount() {
        $this->seo = getSeo(PRICING_SLUG);
    }
    public function render()
    {
        return view('livewire.frontend.pricing')->layout(FRONTEND_LAYOUT,$this->seo);
    }
}
