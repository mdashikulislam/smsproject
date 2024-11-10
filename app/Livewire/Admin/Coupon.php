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
    public $itemId;
    protected $listeners = ['delete'];

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
            'user'=>['All'],
        ];
    }
    public function addNew()
    {
        $this->showEditModal = false;
        $this->mount();
        $this->dispatch('update-select2');
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function store()
    {
        Validator::make($this->state,[
            'code'=>['required','string','max:20','min:4','regex:/^\S*$/','unique:coupons,code'],
            'max_uses'=>['required','integer','min:1'],
            'start'=>['required','date'],
            'expire'=>['required','date','after_or_equal:start'],
            'value'=>['required','between:0,100'],
            'user'=>['required','array'],
        ],[
            'regex' => 'The :attribute cannot contain spaces.',
        ])->validate();
        \DB::beginTransaction();
        try {
            $coupon = CouponModel::create(collect($this->state)->except('user')->toArray());
            if (@$this->state['user'][0] !='All'){
                $coupon->users()->sync($this->state['user']);
            }else{
                $coupon->users()->sync([]);
            }
            \DB::commit();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Coupon create successfully');
            $this->mount();
        }catch (\Exception $exception){
            \DB::rollBack();
            $this->dispatch('toast',type:'error',message:'Coupon not created');
        }
    }

    public function edit(CouponModel $coupon)
    {
        $this->showEditModal = true;
        $this->itemId = $coupon->id;
        $this->state = $coupon->toArray();
        if ($coupon->users->isNotEmpty()){
            $this->state['user'] = $coupon->users->pluck('id')->toArray();
        }else{
            $this->state['user']=['All'];
        }
        $this->dispatch('update-select2');
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function update()
    {
        Validator::make($this->state,[
            'code'=>['required','string','max:20','min:4','regex:/^\S*$/','unique:coupons,code,'.$this->itemId],
            'max_uses'=>['required','integer','min:1'],
            'start'=>['required','date'],
            'expire'=>['required','date','after_or_equal:start'],
            'value'=>['required','between:0,100'],
            'user'=>['required','array'],
        ],[
            'regex' => 'The :attribute cannot contain spaces.',
        ])->validate();
        $coupon = CouponModel::find($this->itemId);
        \DB::beginTransaction();
        try {
            $coupon->update(collect($this->state)->except('user')->toArray());
            if (@$this->state['user'][0] !='All'){
                $coupon->users()->sync($this->state['user']);
            }else{
                $coupon->users()->sync([]);
            }
            \DB::commit();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Coupon Update successfully');
            $this->mount();
        }catch (\Exception $exception){
            \DB::rollBack();
            $this->dispatch('toast',type:'error',message:'Coupon not updated');
        }
    }

    public function delete(CouponModel $coupon)
    {
        $delete = $coupon->delete();
        if ($delete){
            $coupon->users()->sync([]);
            $this->dispatch('toast',type:'success',message:'Coupon deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Coupon not deleted');
        }
    }
    public function getData()
    {
        return CouponModel::with('users')
            ->when(!empty($this->search),function ($q){
                $q->where(function ($query){
                    $query->search('code',$this->search)
                        ->orSearch('max_uses',$this->search)
                        ->orSearch('uses',$this->search)
                        ->orSearch('value',$this->search)
                        ->orSearch('type',$this->search)
                        ->orSearch('use_type',$this->search)
                        ->orSearch('eligible',$this->search);
                });


            })
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
