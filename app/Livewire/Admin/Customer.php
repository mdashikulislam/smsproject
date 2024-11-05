<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Traits\CustomDatatable;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Customer extends Component
{
    use CustomDatatable;

    public function getData()
    {
        return User::with('roles')
            ->whereHas('roles',function ($q){
                $q->where('name',\USER);
            })
            ->orderBy($this->sortBy,$this->orderBy)
            ->paginate($this->perPage);
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Customer')]
    public function render()
    {
        return view('livewire.admin.customer')
            ->with([
                'customers'=>$this->getData()
            ]);
    }
}
