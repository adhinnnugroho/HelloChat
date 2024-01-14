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

    public function createNewChatRoom($selectedContact)
    {
        $uuid = Str::uuid();
        $selectedContact_id = Encryption::decryptId($selectedContact);
        $data_list_contact = modelListContact::where([
            'id' => $selectedContact_id
        ])->first();

        $data_userLogin = Auth::user();

        $checking_data = ChatRoom::checkingAddnewChatRoom($data_list_contact->contact_user_id);

        if (is_null($checking_data)) {
            ChatRoom::create([
                'uuid' => $uuid,
                'uuid_list_contact' => $data_list_contact->uuid,
                'this_users' => $data_userLogin->id,
                'with_users' => $data_list_contact->contact_user_id,
            ]);
        }

        $this->dispatch('startedChat', $selectedContact_id);
    }
}
