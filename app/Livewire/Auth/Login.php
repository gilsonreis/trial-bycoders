<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use App\UseCase\Auth\LoginUseCase;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(Request $request, LoginUseCase $loginUseCase)
    {
        $this->validate();

        $credencials = $this->form->all();
        $authenticated = $loginUseCase->handle($credencials);
        if ($authenticated) {
            $request->session()->regenerate();
            $this->redirect(route('dashboard'));
        }

        $this->addError('auth_failed', 'Incorrect credentials. Please try again.');

    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.login');
    }
}
