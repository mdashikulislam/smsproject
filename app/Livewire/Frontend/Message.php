<?php

namespace App\Livewire\Frontend;

use App\Constants\AppConstants;
use App\Models\Sim;
use App\Models\UserSim;
use Livewire\Component;

class Message extends Component
{
    public $seo = [];
    public function mount()
    {
        $this->seo = getSeo(AppConstants::MESSAGE_SLUG);
    }

    public function getSimsProperty()
    {
        return Sim::select('imsi')
            ->with('userSim')
            ->whereHas('userSim',function($query){
                $query->where('user_id',auth()->user()->id);
                $query ->where('is_user_delete','No');
            })->pluck('imsi')->unique();
    }
    public function render()
    {
        return view('livewire.frontend.message')
            ->layout(AppConstants::FRONTEND_LAYOUT, $this->seo);
    }
}
