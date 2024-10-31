<?php

namespace App\Livewire\Admin;

use App\Models\Inbox;
use App\Traits\CustomDatatable;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MessageList extends Component
{
    use CustomDatatable;
    protected $listeners = ['delete'];
    public function getData()
    {
        return Inbox::when(!empty($this->search),function ($q){
            $q->where(function($query){
                $query->search('from_no',$this->search)
                ->orSearch('message',$this->search);
            });
        })
        ->orderBy($this->sortBy, $this->orderBy)->paginate($this->perPage);
    }

    public function mount()
    {
        $this->sortBy = 'rec_time';
    }
    public function boot()
    {
        $this->setModel(Inbox::class);
    }

    public function delete(Inbox $inbox)
    {
        $delete = $inbox->delete();
        if ($delete){
            $this->dispatch('toast',type:'success',message:'Message deleted successfully');
        }else{
            $this->dispatch('toast',type:'error',message:'Message not deleted');
        }
    }
    #[Layout(ADMIN_LAYOUT)]
    #[Title('Message List')]
    public function render()
    {
        return view('livewire.admin.message-list')
            ->with([
                'messages' => $this->getData(),
            ]);
    }
}
