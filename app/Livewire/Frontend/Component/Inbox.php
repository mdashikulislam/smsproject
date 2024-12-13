<?php

namespace App\Livewire\Frontend\Component;

use App\Models\Sim;
use Livewire\Component;
use \App\Models\Inbox as InboxModel;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;
    public $imsi = [];
    public $duration;
    public $filter = '';

    public function deleteMessage()
    {
        if (is_null($this->duration)){
            $this->dispatch('toast',type:'error',message:'Please select duration');
        }else{
            dd($this->duration);
        }
    }
    public function mount($imsi = [])
    {
        $this->imsi = $imsi;
    }

    public function getInbox()
    {
        return InboxModel::with('sim')
            ->whereHas('sim',function ($query){
                $query->when(!empty($this->filter),function ($q){
                    $q->where('phone_number',$this->filter);
                });
            })
            ->whereIn('imsi', $this->imsi)
            ->where('is_deleted',0)
            ->orderByDesc('rec_time')
            ->paginate(10);
    }

    public function getPhoneNumbers()
    {
        return Sim::whereIn('imsi',$this->imsi)->pluck('phone_number');
    }
    public function render()
    {
        return view('livewire.frontend.component.inbox')
            ->with([
                'inboxes' => $this->getInbox(),
                'phoneNumbers'=>$this->getPhoneNumbers()
            ]);
    }
}
