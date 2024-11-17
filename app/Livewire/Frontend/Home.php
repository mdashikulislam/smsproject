<?php

namespace App\Livewire\Frontend;

use Livewire\Component;

class Home extends Component
{
    public $seo = [];
    public function mount() {
        $this->seo = getSeo(HOME_SLUG);
    }
    public function render()
    {
        return view('livewire.frontend.home')->layout(FRONTEND_LAYOUT,$this->seo);
    }

}
