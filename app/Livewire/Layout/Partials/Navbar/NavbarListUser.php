<?php

namespace App\Livewire\Layout\Partials\Navbar;

use App\Models\Accounts\UserDetails;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavbarListUser extends Component
{
    public $userLogin;

    public $listeners = [
        'refreshNavbar' => '$refresh',
        'setting:profileImageUpdated' => 'mount',
    ];

    public function render()
    {
        return view('livewire.layout.partials.navbar.navbar-list-user');
    }

    public function mount()
    {
        $data_userLogin = Auth::user();
        $this->userLogin = UserDetails::where(['id' => $data_userLogin->id])->first();
    }
}
