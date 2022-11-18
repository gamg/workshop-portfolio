<?php

namespace App\Http\Livewire\Contact;

use App\Http\Livewire\Traits\Notification;
use App\Http\Livewire\Traits\Slideover;
use App\Models\PersonalInformation;
use Livewire\Component;

class Contact extends Component
{
    use Slideover, Notification;

    public PersonalInformation $contact;

    protected $rules = ['contact.email' => 'required|email:filter'];

    public function mount()
    {
        $this->contact = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function edit()
    {
        $this->validate();

        $this->contact->save();

        $this->reset('openSlideover');
        $this->notify(__('Contact email updated successfully!'));
    }

    public function render()
    {
        return view('livewire.contact.contact');
    }
}
