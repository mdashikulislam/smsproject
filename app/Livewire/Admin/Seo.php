<?php

namespace App\Livewire\Admin;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use \App\Models\Seo as SeoModel;
class Seo extends Component
{
    use CustomDatatable;
    public $showEditModal;
    public $state = [];
    public $itemId;
    protected $listeners = ['delete'];
    public function mount()
    {
        $this->showEditModal = false;
        $this->initState();
    }
    public function initState()
    {
        $this->state = [
            'title' => '',
            'slug' => '',
            'seo_title'=>'',
            'seo_description'=>'',
            'seo_keyword'=>'',
        ];
    }
    public function generateSlug()
    {
        $this->state['slug'] = Str::slug($this->state['title']);
        if ($this->showEditModal){
            Validator::make($this->state,[
                'slug' => ['unique:seos,slug,'.$this->itemId],
            ])->validate();
        }else{
            Validator::make($this->state,[
                'slug' => ['unique:seos,slug'],
            ])->validate();
        }

    }
    public function addNew()
    {
        $this->initState();
        $this->showEditModal = false;
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function store()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string','max:255'],
            'slug' => ['required', 'string','unique:seos,slug'],
            'seo_title' => ['nullable', 'string','max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['string', 'nullable'],
        ])->validate();
        $seo = SeoModel::create($this->state);
        if ($seo){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Seo create successfully');
            $this->initState();
        }else{
            $this->dispatch('toast',type:'error',message:'Seo not created');
        }
    }

    public function edit(SeoModel $seo)
    {
        $this->showEditModal = true;
        $this->itemId = $seo->id;
        $this->state = $seo->toArray();
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function update()
    {
        Validator::make($this->state, [
            'title' => ['required', 'string','max:255'],
            'slug' => ['required', 'string','unique:seos,slug,'.$this->itemId],
            'seo_title' => ['nullable', 'string','max:255'],
            'seo_description' => ['nullable', 'string'],
            'seo_keyword' => ['string', 'nullable'],
        ])->validate();
        $seo = SeoModel::find($this->itemId);
        $seo->update($this->state);
        if ($seo){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Seo updated successfully');
            $this->initState();
        }else{
            $this->dispatch('toast',type:'error',message:'Seo not updated');
        }
    }

    public function delete(SeoModel $seo)
    {
        $delete = $seo->delete();
        if ($delete){
            $this->dispatch('toast',type:'success',message:'Seo deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Seo not deleted');
        }
    }
    public function getData()
    {
        return SeoModel::orderBy($this->sortBy,$this->orderBy)->paginate($this->perPage);
    }

    #[Layout(ADMIN_LAYOUT)]
    #[Title('Seo')]
    public function render()
    {
        return view('livewire.admin.seo')
            ->with([
                'seoData'=>$this->getData(),
            ]);
    }
}
