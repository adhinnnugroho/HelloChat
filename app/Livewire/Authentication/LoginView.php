<?php

namespace App\Livewire\Authentication;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginView extends Component
{

    public $email, $password;
    public function render()
    {
        return view('livewire.authentication.login-view');
    }

    public function validationsForm()
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        $this->submit();
    }

    public function submit()
    {

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }


        return
            $this->alert('error', 'email dan password yang kamu masukan salah nih', [
                'position' => 'center',
                'timer' => 3000,
            ]);;
    }
}
