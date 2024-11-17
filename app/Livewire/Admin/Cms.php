<?php

namespace App\Livewire\Admin;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Cms as CmsModel;
class Cms extends Component
{
    use CustomDatatable;
    public $showEditModal;
    public $state = [];
    protected $listeners = ['delete'];
    public $itemId;
    public function boot()
    {
        $this->setModel(CmsModel::class);
    }
    public function mount()
    {
        $this->dispatch('editor-load');
        $this->initState();
    }

    public function initState()
    {
        $this->state = [
            'title' => '',
            'slug' => '',
            'content'=>'',
            'seo_title'=>'',
            'seo_description'=>'',
            'seo_keyword'=>'',
        ];
    }
    public function generateSlug()
    {
        $this->state['slug'] = Str::slug($this->state['title']);
        Validator::make($this->state,[
            'slug' => ['unique:cms,slug'],
        ])->validate();
    }
    public function getData()
    {
        return CmsModel::orderBy($this->sortBy,$this->orderBy)->paginate($this->perPage);
    }

    public function addNew()
    {
        $this->showEditModal = false;
        $this->dispatch('editor-load');
        $this->dispatch('update-ckeditor');
        $this->dispatch('show-modal', id: 'curdModal');
    }


    public function store()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string','max:255'],
            'slug' => ['required', 'string','unique:cms,slug'],
            'seo_title' => ['nullable', 'string','max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['string', 'nullable'],
        ])->validate();
        $cms = CmsModel::create($this->state);
        if ($cms){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Cms create successfully');
            $this->initState();
        }else{
            $this->dispatch('toast',type:'error',message:'Cms not created');
        }
    }
    public function edit(CmsModel $cms)
    {
        $this->showEditModal = true;
        $this->itemId = $cms->id;
        $this->state = $cms->toArray();
        $this->dispatch('update-ckeditor');
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function update()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string','max:255'],
            'slug' => ['required', 'string','unique:cms,slug,'.$this->itemId],
            'seo_title' => ['nullable', 'string','max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['string', 'nullable'],
        ])->validate();
        $cms = CmsModel::find($this->itemId);
        $cms->update($this->state);
        if ($cms){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Cms updated successfully');
            $this->initState();
        }else{
            $this->dispatch('toast',type:'error',message:'Cms not created');
        }
    }
    public function delete(CmsModel $cms)
    {
        $delete = $cms->delete();
        if ($delete){
            $this->dispatch('toast',type:'success',message:'Cms deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Cms not deleted');
        }
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Cms')]
    public function render()
    {
        return view('livewire.admin.cms')
            ->with([
                'cmsData' => $this->getData(),
            ]);
    }
}
