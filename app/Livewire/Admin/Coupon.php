<?php

namespace App\Livewire\Admin;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use \App\Models\Coupon as CouponModel;
class Coupon extends Component
{
    use CustomDatatable;
    public $showEditModal = false;
    public $state = [];
    public function boot()
    {
        $this->setModel(CouponModel::class);
    }

    public function mount()
    {
        $this->state = [
            'code'=>'',
            'max_uses'=>'0',
            'start'=>'',
            'expire'=>'',
            'value'=>'0',
            'type'=>'Percentage',
            'use_type'=>'Single',
            'eligible'=>'All',
            'user'=>[],
        ];
    }
    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function store()
    {
        Validator::make($this->state,[
            'code'=>['required','string','max:20','unique:coupons,code'],
            'max_uses'=>['required','integer','min:1'],
            'start'=>['required','date'],
            'expire'=>['required','date','after_or_equal:start'],
            'value'=>['required','between:0,100'],
            'user'=>['required','array'],
        ])->validate();
    }
    public function getData()
    {
        return CouponModel::with('couponUsers')
            ->orderBy($this->sortBy,$this->orderBy)->paginate($this->perPage);
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Coupons')]
    public function render()
    {
        return view('livewire.admin.coupon')
            ->with(['coupons'=>$this->getData()]);
    }
}
