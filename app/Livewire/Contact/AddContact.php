<?php

namespace App\Livewire\Contact;

use Livewire\Component;

class AddContact extends Component
{
    public function render()
    {
        return view('livewire.contact.add-contact');
    }

    public function validationFrom()
    {
    }
}
