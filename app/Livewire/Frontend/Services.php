<?php

namespace App\Livewire\Frontend;

use App\Constants\AppConstants;
use App\Models\Coupon;
use App\Models\CouponHistory;
use App\Models\Setting;
use App\Models\SingleService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Services extends Component
{
    public $search = '';
    public $singleService = [];
    public $network = '';
    public $coupon;
    public $activeCoupon = [];
    public $currentUser;
    public $setting;
    public $finalPrice = 0;
    public $purchaseData = [];
    public $basePrice = 0;
    public $seo = [];
    public function buy(SingleService $singleService)
    {
        $this->refreshInitData();
        if (!auth()->check()) {
            Session::put('url.intended', route('services'));
            return $this->redirect(route('login'),true);
        }else{
            $this->singleService = $singleService->toArray();
            if (auth()->user()->is_new == '1' && @$this->setting->new_user_discount > 0){
                $this->finalPrice = $this->basePrice = calculatePriceWithDiscount($singleService->price,$this->setting->new_user_discount);
            }else{
                $this->finalPrice = $this->basePrice = $singleService->price;
            }
            $this->dispatch('buy-modal');
        }
    }

    public function purchase()
    {

    }
    public function mount()
    {
        $this->seo = getSeo(AppConstants::SERVICES_SLUG);
        $this->currentUser = auth()->user();
        $this->setting = Setting::first();
        $this->refreshInitData();
    }

    public function refreshInitData()
    {
        $this->clearValidation();
        $this->singleService = [
            'name'=>'',
            'price'=>0,
        ];
        $this->coupon = '';
        $this->activeCoupon = [];
        $this->finalPrice = 0;
        $this->basePrice = 0;
    }

    public function removeValidation()
    {
        $this->clearValidation();
    }
    public function calculateCoupon()
    {

        $this->clearValidation();
        $couponResult = Coupon::with('users')->where('code',$this->coupon)->first();
        if (empty($couponResult)){
            return $this->addError('coupon','Coupon not found');
        }
        $currentDate = Carbon::now();
        if ($currentDate->lt($couponResult->start)){
            return $this->addError('coupon','Coupon not start yet');
        }
        if ($currentDate->gt($couponResult->expire)){
            return $this->addError('coupon','Coupon has expired');
        }
        if ($couponResult->users->isNotEmpty()){
            if (! in_array($this->currentUser->id, $couponResult->users->pluck('id')->toArray())){
                return $this->addError('coupon','Sorry You are not valid for This coupon');
            }
        }
        if ($couponResult->eligible =='New' && ($this->currentUser->is_new != '1')){
            return $this->addError('coupon','Sorry You are not valid for This coupon');
        }else if ($couponResult->eligible =='Old' && ($this->currentUser->is_new != '0')){
            return $this->addError('coupon','Sorry You are not valid for This coupon');
        }
        if ($couponResult->use_type == 'Single'){
            $useHistory = CouponHistory::where('coupon_id',$couponResult->id)->where('user_id',$this->currentUser->id)->first();
            if ($useHistory){
                return $this->addError('coupon','Sorry You are already used for this coupon');
            }
        }
        $this->activeCoupon = $couponResult;
        if ($couponResult->type == 'Fixed'){
            $afterValue = (float) $this->basePrice - (float)$couponResult->value;
        }else{
            $afterValue = calculatePriceWithDiscount((float)$this->basePrice,(float)$couponResult->value);
        }
        if ($afterValue > 0){
            $this->finalPrice = $afterValue;
        }else{
            $this->finalPrice = 0;
        }
        $this->coupon = '';
    }

    public function removeCoupon():void
    {
        $this->finalPrice = $this->basePrice;
        $this->activeCoupon = [];
    }
    public function render()
    {
        $services = SingleService::where('status', AppConstants::STATUS_ENABLED);
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
            ->layout(FRONTEND_LAYOUT,$this->seo)
            ->with([
                'services' => $services
            ]);
    }
}
