<?php

namespace App\Livewire\Frontend\Component;

use App\Models\Sim;
use Carbon\Carbon;
use Livewire\Component;
use \App\Models\Inbox as InboxModel;
use Livewire\WithPagination;

class Inbox extends Component
{
    use WithPagination;
    public $imsi = [];
    public $duration;
    public $filter = '';
    protected $listeners = ['confirmDelete'];
    public function deleteMessage()
    {
        if (is_null($this->duration)){
            $this->dispatch('toast',type:'error',message:'Please select duration');
        }else{
            $this->dispatch('confirm-delete');
        }
    }

    public function confirmDelete()
    {
        $inbox = InboxModel::whereIn('imsi', $this->imsi);
        if ($this->duration != 'all'){
            $inbox = $inbox->where('created_at','>=',Carbon::now()->subMinutes(intval($this->duration)));
        }
        $inbox = $inbox->with('sim')
            ->whereHas('sim',function ($query){
                $query->when(!empty($this->filter),function ($q){
                    $q->where('phone_number',$this->filter);
                });
            })
            ->where('is_deleted',0)
            ->update(['is_deleted'=>1]);
        if ($inbox){
            $this->dispatch('toast',type:'success',message:'Deleted Successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Inbox not deleted');
        }
        $this->duration = null;
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
        return Sim::whereIn('imsi',$this->imsi)
            ->pluck('phone_number');
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
