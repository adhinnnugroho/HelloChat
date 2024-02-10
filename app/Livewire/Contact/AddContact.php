<?php

namespace App\Livewire\Contact;

use App\Models\Chat\ChatRoom;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\ListContact;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AddContact extends Component
{
    use LivewireAlert;
    #[Validate([
        'contact.name' => 'required',
        'contact.code' => 'required',
    ], message: [
        'required' => 'The :attribute is missing.',
        'contact.name.required' => 'Nama Wajib diisi',
        'contact.code.required' => 'Code diisi',
    ])]
    public $contact;

    public function render()
    {
        return view('livewire.contact.add-contact');
    }

    public function mount()
    {
        $this->fill([
            'contact' => [
                'name' => null,
                'code' => null
            ]
        ]);
    }

    public function rules()
    {
        return [
            'contact.name' => 'required',
            'contact.code' => 'required',
        ];
    }


    public function validationFrom()
    {
        $validated = $this->validate();
        $this->submit();
    }

    public function submit()
    {
        $uuid = Str::uuid();

        $user_token = User::where([
            'user_token' => $this->contact['code']
        ])->first();


        if (is_null($user_token)) {
            $alert = [
                'status' => 'error',
                'title' => '',
                'message' => 'code  tidak di temukan',
            ];

            $this->setAlert($alert['status'], $alert['title'], $alert['message']);
            return;
        }

        $data_userLogin = Auth::user();

        $dataContact = ListContact::create([
            'uuid' => $uuid,
            'name'  => $this->contact['name'],
            'id_user_login' => Auth::user()->id,
            'contact_user_id' => $user_token->id,
            'saved_contact_date' => date('Y-m-d H:i:s')
        ]);

        $checking_data = ChatRoom::checkingAddnewChatRoom($user_token->id);
        if (is_null($checking_data)) {
            $chat_romm_id =  ChatRoom::create([
                'uuid' => $uuid,
                'uuid_list_contact' => $dataContact->uuid,
                'this_users' => $data_userLogin->id,
                'with_users' => $dataContact->contact_user_id,
            ]);
        } else {
            $chat_romm_id = $checking_data;
        }

        ListContact::where([
            'id' => $dataContact->id
        ])->update([
            'chat_room_id' => $chat_romm_id->id
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Kontak Berhasil Ditambahkan',
        ];

        $this->setAlert($alert['status'], $alert['title'], $alert['message']);

        $this->dispatch('setting:profileImageUpdated');
    }


    private function setAlert($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
        ]);
    }
}
