<?php

namespace App\Livewire\Frontend;

use App\Models\Sim;
use Livewire\Component;

class FreeSms extends Component
{
    public function render()
    {
        $freeSims = Sim::where('type','Free')->get();
        return view('livewire.frontend.free-sms')
            ->layout(FRONTEND_LAYOUT,['seoTitle' => 'Free Sms'])
            ->with([
                'freeSims' => $freeSims,
            ]);
    }
}
