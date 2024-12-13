<?php

namespace App\Livewire\Frontend;

use App\Constants\AppConstants;
use App\Models\UserSim;
use Livewire\Component;
use Livewire\WithPagination;

class NumberList extends Component
{
    use WithPagination;
    public $seo = [];
    public $deleteItem;
    protected $listeners = ['delete'];
    public function mount()
    {
        $this->seo = getSeo(AppConstants::NUMBER_LIST_SLUG);
    }

    public function delete($userSim)
    {
        $userSim = UserSim::find($userSim);
        if (empty($userSim)) {
            $this->dispatch('toast',type:'error',message:'Sim not found');
            return;
        }
        $userSim->is_user_delete = 'Yes';
        $userSim->save();
        $this->dispatch('toast',type:'success',message:'Sim deleted successfully');
    }
    public function getNumbersProperty()
    {
        return UserSim::with('sim')
            ->whereHas('sim')
            ->where('user_id', auth()->id())
            ->where('is_user_delete','No')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function render()
    {
        return view('livewire.frontend.number-list')
            ->layout(FRONTEND_LAYOUT,$this->seo)
            ->with([
                'numbers' => $this->numbers,
            ]);
    }
}
