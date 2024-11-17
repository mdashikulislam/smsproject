<?php

namespace App\Livewire\Frontend;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactUs extends Component
{
    #[Validate('required|max:255')]
    public $name;
    #[Validate('required|max:255|email')]
    public $email;
    #[Validate('required')]
    public $message;

    public $seo = [];
    public function mount()
    {
        $this->seo = getSeo(PRICING_SLUG);
        $this->name = '';
        $this->email = '';
        $this->message = '';
    }
    public function sendContactMessage()
    {
        $this->validate();
        $contact = Contact::create($this->only('name', 'email', 'message'));
        if ($contact){
            $this->dispatch('toast',type:'success',message:'Thanks for contacting us!');
            $this->mount();
        }else{
            $this->dispatch('toast',type:'error',message:'Something went wrong!');
        }
    }
    public function render()
    {
        return view('livewire.frontend.contact-us')
            ->layout(FRONTEND_LAYOUT,$this->seo);
    }
}
