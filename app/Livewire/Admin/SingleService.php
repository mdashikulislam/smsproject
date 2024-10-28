<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Yajra\DataTables\DataTables;
use \App\Models\SingleService as SingleServiceModel;
class SingleService extends Component
{
    public $showEditModal = false;
    public $state = [];
    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatch('show-modal',['id'=>'curdModal']);
        //$this->dispatch('reloadTable');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => ['required', 'string','max:255','unique:single_services,name'],
            'price' => ['required', 'numeric','min:0.01'],
        ])->validate();
        
    }
    public function dataTable()
    {
        return DataTables::of(SingleServiceModel::query())->make(true);
    }
    public function render()
    {
        return view('livewire.admin.single-service')->layout(ADMIN_LAYOUT);
    }
}
