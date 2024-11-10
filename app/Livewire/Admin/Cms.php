<?php

namespace App\Livewire\Admin;

use App\Traits\CustomDatatable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
    public $content;
    public function boot()
    {
        $this->setModel(CmsModel::class);
        $this->dispatch('editor-load');
    }
    public function mount()
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
        $this->dispatch('show-modal', id: 'curdModal');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'title' => ['required', 'string','max:255'],
            'slug' => ['required', 'string','unique:cms,slug'],
            'seo_title' => ['nullable', 'string','max:255'],
             'seo_description' => ['nullable', 'string'],
             'seo_keyword' => ['string', 'nullable'],
        ])->validate();
        dd($this->state);
        $cms = CmsModel::create($this->state);
        if ($cms){
            $this->dispatch('hide-modal',id:'curdModal');
            $this->dispatch('toast',type:'success',message:'Cms create successfully');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Cms not created');
        }
    }

    public function edit(CmsModel $cms)
    {
        $this->showEditModal = true;
        $this->itemId = $cms->id;
        $this->state = $cms->toArray();
        $this->dispatch('show-modal', id: 'curdModal');
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
