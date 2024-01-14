<?php

namespace App\Livewire\NewContact;

use App\Models\User;
use Livewire\Component;
use App\Models\ListContact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddNewContact extends Component
{
    use LivewireAlert;
    public $search;
    public $user;

    public function render()
    {
        return view('livewire.new-contact.add-new-contact');
    }

    public function mount()
    {
        $this->user = collect([]);
    }

    public function updatedSearch($value)
    {
        if (!is_null($value)) {
            $this->user = User::where(function ($query) use ($value) {
                $query->where('user_token', 'like', '%' . $value . '%');
            })->where('id', '!=', Auth::user()->id)->get();
        } else {
            $this->user = null;
        }
    }

    public function validationFrom($id)
    {
        $uuid = Str::uuid();
        ListContact::create([
            'uuid' => $uuid,
            'id_user_login' => Auth::user()->id,
            'contact_user_id' => $id,
            'saved_contact_date' => date('Y-m-d H:i:s')
        ]);

        $alert = [
            'status' => 'success',
            'title' => '',
            'message' => 'Kontak Berhasil Ditambahkan',
        ];

        $this->setToast($alert['status'], $alert['title'], $alert['message']);

        $this->dispatch('setting:profileImageUpdated');
    }

    public function setToast($status, $title, $message)
    {
        return $this->alert($status, $title, [
            'position' => 'center',
            'timer' => 3000,
            'text' => $message,
        ]);
    }
}
