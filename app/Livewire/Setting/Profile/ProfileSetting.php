<?php

namespace App\Livewire\Setting\Profile;

use App\Models\Accounts\UserDetails;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileSetting extends Component
{
    public $userLogin;

    public $listeners = [
        'refreshNavbar' => '$refresh',
        'setting:profileImageUpdated' => 'mount',
    ];

    public function render()
    {
        return view('livewire.setting.profile.profile-setting');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->userLogin = UserDetails::where(['id' => $data_userLogin->id])->first();
    }
}
