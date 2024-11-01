<?php
namespace App\Traits;
use Livewire\Component;
use Livewire\WithPagination;

trait CustomDatatable
{
    use WithPagination;
    public $model;
    public $perPage = 10;
    public $sortBy = 'id';
    public $orderBy = 'DESC';
    public $search = '';
    public $checked = [];
    public $is_checked_all = false;
    public $isDeleteActive = false;
    protected $traitListeners = [
        'bulkDestroy' => 'bulkDestroy',
    ];
    public function initTrait()
    {
        // Optional method that runs after mount if desired
        if (method_exists($this, 'init')) {
            $this->init();
        }
    }
    public function initListeners()
    {
        if (property_exists($this, 'listeners')) {
            $this->listeners = array_merge($this->listeners, $this->traitListeners);
        } else {
            $this->listeners = $this->traitListeners;
        }
    }
    public function setModel($model)
    {
        $this->model = $model;
        $this->initListeners();
    }

    public function checkAll()
    {
        if ($this->is_checked_all) {
            $this->isDeleteActive = true;
            $this->checked = $this->getData()->pluck('id')->all();
        } else {
            $this->isDeleteActive = false;
            $this->checked = [];
        }
    }
    public function singleCheck()
    {
        if (!empty($this->checked)){
            $this->isDeleteActive = true;
        }else{
            $this->isDeleteActive = false;
        }
    }
    public function getData()
    {
        if (!$this->model) {
            throw new \Exception("Please define Model into constructor " . __CLASS__);
        }
        return $this->model::query()->orderBy($this->sortBy, $this->orderBy)->paginate($this->perPage);
    }
    public function sortByColumn($field)
    {
        if ($this->sortBy === $field) {
            $this->orderBy = $this->orderBy === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->orderBy = 'ASC';
        }
        $this->sortBy = $field;
    }
    public function bulkDestroy()
    {
        $delete =  $this->model::whereIntegerInRaw('id', $this->checked)->delete();
        if ($delete){
            $this->isDeleteActive =false;
            $this->is_checked_all = false;
            $this->resetPage();
            $this->dispatch('toast',type:'success',message:'Service deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Service not deleted');
        }
    }
    //Livewire hooks
    public function updating($name, $value)
    {
        switch ($name) {
            case 'search':
            case 'perPage':
                $this->resetPage();
                break;
        }
    }
}
