<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\ListContact as modelListContact;
use Illuminate\Support\Facades\Auth;

class ListContact extends Component
{

    public $contact;
    public function render()
    {
        return view('livewire.contact.list-contact');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->contact = modelListContact::where([
            'id_user_login' => $data_userLogin->id
        ])->get();
    }
}
