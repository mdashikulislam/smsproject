<?php

namespace App\Livewire\Frontend\Component;

use Livewire\Component;
use \App\Models\Inbox as InboxModel;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;
    public $imsi = [];
    public $duration;

    public function deleteMessage()
    {
        if (is_null($this->duration)){
            $this->dispatch('toast',type:'error',message:'Please select duration');
        }else{
            dd($this->duration);
        }
    }
    public function mount($imsi)
    {
        $this->imsi = $imsi;
    }

    public function getInbox()
    {
        return InboxModel::whereIn('imsi', $this->imsi)
            ->where('is_deleted',0)
            ->orderByDesc('rec_time')
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.component.inbox')
            ->with([
                'inboxes' => $this->getInbox(),
            ]);
    }
}
