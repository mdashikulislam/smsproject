<?php

namespace App\Livewire\Frontend;

use App\Models\Setting;
use App\Models\SingleService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Services extends Component
{
    public $search = '';
    public $state = [];
    public $coupon;
    public $currentUser;
    public $setting;
    public $finalPrice = 0;
    public function buy(SingleService $singleService)
    {
        if (!auth()->check()) {
            Session::put('url.intended', route('services'));
            return $this->redirect(route('login'),true);
        }else{
            $this->state = $singleService->toArray();
            if (auth()->user()->is_new == '1' && @$this->setting->new_user_discount > 0){
                $this->finalPrice = calculatePriceWithDiscount($singleService->price,$this->setting->new_user_discount);
            }else{
                $this->finalPrice = $singleService->price;
            }
            $this->dispatch('buy-modal');
        }
    }

    public function mount()
    {
        $this->currentUser = auth()->user();
        $this->setting = Setting::first();
        $this->state = [
            'name'=>'',
            'price'=>''
        ];
    }

    public function calculateCoupon()
    {

    }
    public function render()
    {
        $services = SingleService::where('status', STATUS_ENABLED);
        if (!empty($this->search)) {
            $servicesWithSearch = clone $services;
            $servicesWithSearch = $servicesWithSearch->where('name', 'LIKE', "%{$this->search}%")->orderByDesc('is_other_site')->orderByDesc('id')->get();
            if ($servicesWithSearch->isNotEmpty()) {
                $services = $servicesWithSearch;
            } else {
                $services = $services->where('is_other_site', 1)->orderByDesc('id')->get();
            }
        } else {
            $services = $services->orderByDesc('is_other_site')->orderByDesc('id')->get();
        }
        return view('livewire.frontend.services')
            ->layout('frontend.layouts.app',['seoTitle' => 'Services'])
            ->with([
                'services' => $services
            ]);
    }
}
