<?php

namespace App\Livewire\Forms\Users;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate('required')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|min:4')]
    public string $password;

    #[Validate('required|min:4|same:password')]
    public string $confirmPassword;
}
