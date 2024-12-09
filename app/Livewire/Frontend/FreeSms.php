<?php

namespace App\Livewire\Frontend;

use App\Constants\AppConstants;
use App\Models\Sim;
use Livewire\Component;

class FreeSms extends Component
{
    public $seo = [];
    public function mount() {
        $this->seo = getSeo(AppConstants::FREE_SMS_SLUG);
    }
    public function render()
    {
        $freeSims = Sim::where('type','Free')->get();
        return view('livewire.frontend.free-sms')
            ->layout(FRONTEND_LAYOUT,$this->seo)
            ->with([
                'freeSims' => $freeSims,
            ]);
    }
}
