<?php

namespace App\Livewire\Setting\Profile\Partials;

use Livewire\Component;
use App\Models\Accounts\UserDetails;
use Illuminate\Support\Facades\Auth;

class ShowProfileImage extends Component
{
    public $userLogin;
    public function render()
    {
        return view('livewire.setting.profile.partials.show-profile-image');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->userLogin = UserDetails::where(['id' => $data_userLogin->id])->first();
    }

    public function getUserProfile()
    {
        $data_userLogin = Auth::user();
        $this->userLogin = UserDetails::where(['id' => $data_userLogin->id])->first();
    }
}
