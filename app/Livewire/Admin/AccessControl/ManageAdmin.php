<?php

namespace App\Livewire\Admin\AccessControl;

use App\Models\User;
use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ManageAdmin extends Component
{
    use CustomDatatable;
    public $showEditModal = false;
    public $state;
    public $defaultRole;
    public $itemId;
    protected $listeners = ['delete'];
    public function mount()
    {
        $this->defaultRole = \Spatie\Permission\Models\Role::where('name','!=',\USER)->first();
        $this->state = [
            'name'=>'',
            'email'=>'',
            'password'=>'',
            'status'=>'1',
            'role'=>@$this->defaultRole->id ?? 1,
        ];
    }
    public function addNew()
    {
        $this->mount();
        $this->showEditModal = false;
        $this->dispatch('show-modal',id:'curdModal');
    }
    public function store()
    {
        Validator::make($this->state, [
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'string','max:255','unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required','numeric'],
            'role' => ['required','numeric'],
        ])->validate();
        \DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $this->state['name'];
            $user->email = $this->state['email'];
            $user->password = Hash::make($this->state['password']);
            $user->status = $this->state['status'];
            $user->save();
            $user->assignRole(\Spatie\Permission\Models\Role::where('id',$this->state['role'])->first());
            \DB::commit();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'User create successfully');
            $this->mount();
        }catch (\Exception $exception){
            \DB::rollBack();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'error',message:$exception->getMessage());
        }
    }
    public function edit(User $user)
    {
        $this->showEditModal = true;
        $this->itemId = $user->id;
        $this->state = $user->toArray();
        $this->state['role'] = $user->roles()->first()->id;
        $this->dispatch('show-modal', id: 'curdModal');
    }
    public function update(){
        $user = User::where('id',$this->itemId)->first();
        if (empty($user)){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'error',message:'User Not found');
            return;
        }
        Validator::make($this->state, [
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'string','max:255','unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'status' => ['required','numeric'],
            'role' => ['required','numeric'],
        ])->validate();
        \DB::beginTransaction();
        try {
            $user->name = $this->state['name'];
            $user->email = $this->state['email'];
            if (@$this->state['password']){
                $user->password = Hash::make($this->state['password']);
            }
            $user->status = $this->state['status'];
            $user->save();
            $user->syncRoles(\Spatie\Permission\Models\Role::where('id',$this->state['role'])->first());
            \DB::commit();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'User update successfully');
            $this->mount();
            \DB::commit();
        }catch (\Exception $exception){
            \DB::rollBack();
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'error',message:$exception->getMessage());
        }
    }
    public function getData()
    {
        return User::with('roles')
            ->whereHas('roles',function ($q){
                $q->where('name','!=',\USER);
            })
            ->when(!empty($this->search),function ($q){
                $q->where(function ($query){
                    $query->search('name',$this->search)
                        ->orSearch('email',$this->search);
                });

            })
            ->orderBy($this->sortBy,$this->orderBy)
            ->paginate($this->perPage);
    }

    public function delete(User $user)
    {
        $delete = $user->delete();
        if ($delete){
            $this->dispatch('toast',type:'success',message:'User deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'User not deleted');
        }
    }
    #[Layout(ADMIN_LAYOUT,['seoTitle'=>'Manage Admin'])]
    public function render()
    {
        return view('livewire.admin.access-control.manage-admin')
            ->with([
                'users'=>$this->getData()
            ]);
    }
}
