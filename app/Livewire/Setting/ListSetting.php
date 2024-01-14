<?php

namespace App\Livewire\Setting;

use App\Models\Accounts\UserDetails;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ListSetting extends Component
{

    public $userLogin;
    public $listeners = [
        'refreshNavbar' => '$refresh',
        'setting:profileImageUpdated' => 'testFunction',
    ];

    public function render()
    {
        return view('livewire.setting.list-setting');
    }


    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->userLogin = UserDetails::where(['id' => $data_userLogin->id])->first();
    }
}
