<?php

namespace App\Livewire\Frontend;

use App\Models\Coupon;
use App\Models\CouponHistory;
use App\Models\Setting;
use App\Models\Sim;
use App\Models\UserSim;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Pricing extends Component
{
    public $seo = [];
    public $currentUser;
    public $setting;
    public $coupon;
    public $activeCoupon = [];
    public $finalPrice = 0;
    public $basePrice = 0;
    public $package;
    public $network = '';
    public $purchaseData = [];
    public function mount() {
        $this->seo = getSeo(PRICING_SLUG);
        $this->currentUser = auth()->user();
        $this->setting = Setting::first();
        $this->refreshInitData();
    }

    public function buy($package)
    {
        $this->refreshInitData();
        if (!auth()->check()) {
            Session::put('url.intended', route('pricing'));
            return $this->redirect(route('login'),true);
        }else{
            $this->package = getPackageInfo($package);
            if (auth()->user()->is_new == '1' && @$this->setting->new_user_discount > 0){
                $this->finalPrice = $this->basePrice = calculatePriceWithDiscount($this->package['price'],$this->setting->new_user_discount);
            }else{
                $this->finalPrice = $this->basePrice = $this->package['price'];
            }
            $this->dispatch('buy-modal');
        }
    }
    public function refreshInitData()
    {
        $this->clearValidation();
        $this->coupon = '';
        $this->activeCoupon = [];
        $this->finalPrice = 0;
        $this->basePrice = 0;
        $this->package = getPackageInfo(1);
        $this->network = '';
        $this->purchaseData = [];
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

    public function purchase()
    {
        if ((float)$this->currentUser->available_balance < (float)$this->finalPrice){
             session()->flash('error', 'You don\'t have enough balance to buy this package. Please reload balance.');
             return;
        }
        $apiUrl = makeSimApiUrl('buy-sim.php');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->withBasicAuth(env('SIM_API_USERNAME'), env('SIM_API_PASSWORD'))
            ->asForm()->post($apiUrl, [
                'qty' => DEFAULT_SIM_QUANTITY,
                'duration' => $this->package['duration'],
            ]);

        if (!$response->successful()) {
            \session()->put('error', 'Something went wrong, please try again later.');
            return;
        }

        $responseData = $response->json();
        if (isset($responseData['data'][0])) {
            $simData = $responseData['data'][0];
            \DB::beginTransaction();
            try {
                $sim = Sim::where('imsi', $simData['imsi'])->first();
                if (empty($sim)) {
                    $sim = new Sim();
                    $sim->imsi = $simData['imsi'];
                    $sim->phone_number = $simData['phone_no'];
                    $sim->type = SIM_TYPE_PAID;
                    $sim->network_type = $simData['network_type'];
                    $sim->save();
                }
                $userSim = new UserSim();
                $userSim->user_id = $this->currentUser->id;
                $userSim->sim_cost = @$this->setting->sim_cost ?? DEFAULT_SIM_COST;
                $userSim->sim_id = $sim->id;
                $userSim->start_date = $simData['start_date'];
                $userSim->end_date = $simData['end_date'];
                $userSim->amount = $this->finalPrice;
                $userSim->save();
                \DB::commit();
                \session()->put('success', 'Your purchase was successful');
            } catch (\Exception $exception) {
                \DB::rollBack();
                \session()->put('error', $exception->getMessage());
            }
        }
        return;
    }
    public function removeValidation()
    {
        $this->clearValidation();
    }
    public function render()
    {
        return view('livewire.frontend.pricing')->layout(FRONTEND_LAYOUT,$this->seo);
    }
}
