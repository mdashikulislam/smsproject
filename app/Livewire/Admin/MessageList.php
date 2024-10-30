<?php

namespace App\Livewire\Admin;

use App\Models\Inbox;
use App\Traits\CustomDatatable;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MessageList extends Component
{
    use CustomDatatable;
    public function getData()
    {
        return Inbox::orderBy($this->sortBy, $this->orderBy)->paginate($this->perPage);
    }

    public function mount()
    {
        $this->sortBy = 'rec_time';
    }
    public function boot()
    {
        $this->setModel(Inbox::class);
    }
    #[Layout(ADMIN_LAYOUT,['seoTitle'=>'Message List'])]
    public function render()
    {
        return view('livewire.admin.message-list')
            ->with([
                'messages' => $this->getData(),
            ]);
    }
}
