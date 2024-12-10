<?php

namespace App\Livewire\Frontend;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Constants\AppConstants;
class Reload extends Component
{
    public $amount;

    public $seo = [];
    protected $rules = [
        'amount' => ['required', 'numeric', 'min:1'],
    ];
    protected $messages = [
        'amount.min' => 'Minimum reload amount is £1',
    ];
    public function mount() {
        $this->seo = getSeo(AppConstants::RELOAD_SLUG);
        $this->amount = 0;

    }

    public function reloadBalance()
    {
        $this->validate();
        auth()->user()->update([
            'available_balance' => $this->amount,
            'total_balance' => $this->amount,
        ]);
        $this->dispatch('balanceUpdated');
    }
    public function render()
    {
        return view('livewire.frontend.reload')
            ->layout(FRONTEND_LAYOUT,$this->seo);
    }
}
