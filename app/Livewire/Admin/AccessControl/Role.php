<?php

namespace App\Livewire\Admin\AccessControl;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use \Spatie\Permission\Models\Role as RoleModel;
class Role extends Component
{
    use CustomDatatable;
    public $showEditModal = false;
    public $state;
    public $itemId;
    protected $listeners = ['delete'];

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

    public function render()
    {
        return view('livewire.admin.access-control.role')
            ->layout(ADMIN_LAYOUT,['seoTitle'=>'Role'])
            ->with([
                'roles'=>$this->getData()
            ]);
    }

    public function showPermission($id)
    {
        $this->dispatch('show-modal', id: 'permission-modal');
    }

}
