<?php

namespace App\Livewire\Admin;

use App\Models\Inbox;
use App\Models\Sim;
use App\Traits\CustomDatatable;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class PhoneNumberList extends Component
{
    use CustomDatatable;
    public function boot()
    {
        $this->setModel(Inbox::class);

    }
    public function getData()
    {
        return Sim::with('userSim')->orderBy($this->sortBy,$this->orderBy)->paginate($this->perPage);
    }

    #[Layout(ADMIN_LAYOUT)]
    #[Title('Phone Number List')]
    public function render()
    {
        return view('livewire.admin.phone-number-list')
            ->with([
                'numbers' => $this->getData(),
            ]);
    }
}
