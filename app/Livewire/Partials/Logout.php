<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        \Auth::logout();
        $this->redirect(route('auth.login'));
    }

    public function render()
    {
        return view('livewire.partials.logout');
    }
}
