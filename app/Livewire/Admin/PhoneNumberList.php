<?php

namespace App\Livewire\Admin;

use App\Models\Sim;
use App\Traits\CustomDatatable;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PhoneNumberList extends Component
{
    use CustomDatatable;

    public function getData()
    {
        return Sim::orderBy($this->sortBy,$this->orderBy)->paginate($this->perPage);
    }

    #[Layout(ADMIN_LAYOUT,['seoTitle'=>'Phone Number List'])]
    public function render()
    {
        return view('livewire.admin.phone-number-list')
            ->with([
                'numbers' => $this->getData(),
            ]);
    }
}
