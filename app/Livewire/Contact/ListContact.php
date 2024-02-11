<?php

namespace App\Livewire\Contact;

use App\Helpers\Encryption;
use App\Models\Chat\ChatRoom;
use Livewire\Component;
use App\Models\ListContact as modelListContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ListContact extends Component
{
    public $listeners = [
        'setting:profileImageUpdated' => 'resetVariabel',
    ];
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

    public function resetVariabel()
    {
        $data_userLogin = Auth::user();
        $this->contact = modelListContact::where([
            'id_user_login' => $data_userLogin->id
        ])->get();
    }

    public function setSelectedContact($contact_id)
    {
        $this->dispatch('HandleChat::SetSelectedContact', $contact_id);
    }
}
