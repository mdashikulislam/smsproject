<?php

namespace App\Livewire\Admin;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Yajra\DataTables\DataTables;
use \App\Models\SingleService as SingleServiceModel;
class SingleService extends Component
{
    use CustomDatatable;
    public $showEditModal = false;
    public $state = [];
    public $itemId = 0;
    protected $listeners = ['delete'];

    //For Datatable
    public function boot()
    {
        $this->setModel(\App\Models\SingleService::class);
    }

    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatch('show-modal', id: 'curdModal');
       // $this->dispatch('reloadTable');
    }
    public function mount(){

        $this->initTrait();
        $this->state = [
            'name' => '',
            'price' => '',
            'from_filter' => '',
            'message_filter' => '',
            'is_other_site' => 0,
            'status' => 1,
        ];
    }
    public function store()
    {
        $validator = Validator::make($this->state, [
            'name' => ['required', 'string','max:255','unique:single_services,name'],
            'price' => ['required', 'numeric','min:0.01'],
        ])->validate();
        $services = SingleServiceModel::create($this->state);
        if ($services){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Service create successfully');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Service not created');
        }
    }

    public function edit(SingleServiceModel $singleService)
    {
        $this->showEditModal = true;
        $this->itemId = $singleService->id;
        $this->state = $singleService->toArray();
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function update()
    {
        $services = SingleServiceModel::where('id',$this->itemId)->first();
        if (empty($services)){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'error',message:'Service Not found');
            return;
        }
        $validator = Validator::make($this->state, [
            'name' => ['required', 'string','max:255','unique:single_services,name,'.$services->id],
            'price' => ['required', 'numeric','min:0.01'],
        ])->validate();
        $update = $services->update($this->state);
        if ($update){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Service updated successfully');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Service not updated');
        }
    }

    public function delete(SingleServiceModel $singleService)
    {
       $delete = $singleService->delete();
       if ($delete){
           $this->dispatch('toast',type:'success',message:'Service deleted successfully');
       }else{
           $this->dispatch('toast',type:'error',message:'Service not deleted');
       }
    }
    public function dataTable()
    {
        return DataTables::of(SingleServiceModel::query())
            ->addColumn('action',function ($q){
                $html = '<div class="btn-group">';
                $html .= "<a   href='#' wire:click.prevent='edit({$q->id})' class='btn btn-sm btn-warning text-white'> <i class='fas fa-edit'></i></a>";
                $html .= "<a   href='#' class='btn btn-sm btn-danger text-white'><i class='fas fa-trash'></i></a>";
                $html .= "</div>";
                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getData()
    {
        return SingleServiceModel::when(!empty($this->search), function ($query) {
                $query->where(function ($query) {
                    $query->search('name', $this->search)
                        ->orSearch('id', $this->search)
                        ->orSearch('price', $this->search)
                        ->orSearch('from_filter', $this->search)
                        ->orSearch('message_filter', $this->search);
                });
            })
            ->orderBy($this->sortBy, $this->orderBy)
            ->paginate($this->perPage);
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Single Service')]
    public function render()
    {
        return view('livewire.admin.single-service')
            ->with([
                'services' => $this->getData()
            ]);
    }
}
