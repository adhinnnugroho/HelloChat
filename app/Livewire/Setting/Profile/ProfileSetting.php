<?php

namespace App\Livewire\Setting\Profile;

use App\Models\Accounts\UserDetails;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileSetting extends Component
{
    public $userLogin;
    public $name, $info_account;
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
        $this->name = $this->userLogin->Users->name;
        $this->info_account = $this->userLogin->info_account ?? "...";
    }

    public function updateName()
    {
        User::where([
            'id' => Auth::user()->id
        ])->update([
            'name' => $this->name
        ]);
        $this->dispatch('refreshNavbar');
    }

    public function updateInfo()
    {
        $data_userLogin = Auth::user();
        UserDetails::where([
            'id' => $data_userLogin->id
        ])->update([
            'info_account' => $this->info_account
        ]);

        $this->dispatch('refreshNavbar');
    }
}
