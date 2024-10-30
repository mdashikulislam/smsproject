<?php

namespace App\Livewire\Admin\AccessControl;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role as RoleModel;
class Role extends Component
{
    use CustomDatatable;
    public $showEditModal = false;
    public $state;
    public $itemId;
    protected $listeners = ['delete'];
    public $permissionChecked = [];
    public $permissionData = [];
    public $selectedRole;
    public $is_checked_all_permission;
    public function boot()
    {
        $this->setModel(RoleModel::class);
    }

    public function mount(){
        $this->state = [
            'name' => ''
        ];
    }
    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => ['required', 'string','max:255','unique:roles,name'],
        ])->validate();
        $services = RoleModel::create($this->state);
        if ($services){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Role create successfully');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Role not created');
        }
    }

    public function edit(RoleModel $role)
    {
        $this->showEditModal = true;
        $this->itemId = $role->id;
        $this->state['name'] = $role->name;
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function update()
    {

        $role = RoleModel::where('id',$this->itemId)->first();
        if (empty($role)){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'error',message:'Service Not found');
            return;
        }
        $validator = Validator::make($this->state, [
            'name' => ['required', 'string','max:255','unique:single_services,name,'.$role->id],
        ])->validate();
        $update = $role->update($this->state);
        if ($update){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Role updated successfully');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Role not updated');
        }
    }
    public function delete(RoleModel $role)
    {
        $delete = $role->delete();
        if ($delete){
            $this->dispatch('toast',type:'success',message:'Role deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Role not deleted');
        }
    }
    public function getData()
    {
        return RoleModel::when(!empty($this->search),function ($query){
            $query->search('name', $this->search);
        })->withCount('users')->orderBy($this->sortBy, $this->orderBy)->paginate($this->perPage);
    }
    #[Layout(ADMIN_LAYOUT,['seoTitle'=>'Manage Role'])]
    public function render()
    {
        return view('livewire.admin.access-control.role')
            ->with([
                'roles'=>$this->getData()
            ]);
    }


    public function showPermission(RoleModel $role)
    {
        $this->is_checked_all_permission = false;
        $this->selectedRole = $role;
        $this->permissionData = Permission::get();
        $this->permissionChecked = $this->selectedRole->permissions->pluck('id')->toArray();
        if (count($this->permissionChecked) > 0 && (count($this->permissionChecked) == $this->permissionData->count())){
            $this->is_checked_all_permission = true;
        }
        $this->dispatch('show-modal', id: 'permission-modal');
    }

    public function checkAllPermission()
    {
        if ($this->is_checked_all_permission) {
            $this->permissionChecked = $this->permissionData->pluck('id')->toArray();
            $this->selectedRole->syncPermissions($this->permissionData);
        } else {
            $this->permissionChecked = [];
            $this->selectedRole->syncPermissions([]);
        }
        $this->dispatch('toast',type:'success',message:'All Permissions Updated');
    }
    public function updateSinglePermission()
    {
        if (!empty($this->permissionChecked)){
            $permissions = Permission::whereIn('id', $this->permissionChecked)->get();
            $this->selectedRole->syncPermissions($permissions);
        }else{
            $this->selectedRole->syncPermissions([]);
        }
        if (count($this->permissionChecked) > 0 && (count($this->permissionChecked) == $this->permissionData->count())){
            $this->is_checked_all_permission = true;
        }else{
            $this->is_checked_all_permission = false;
        }
        $this->dispatch('toast',type:'success',message:'Permissions Updated');
    }
}
