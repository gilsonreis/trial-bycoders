<?php

namespace App\Livewire\Forms\Users;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ChangePasswordForm extends Form
{
    #[Validate('required|min:4')]
    public string $password;

    #[Validate('required|min:4|same:password')]
    public string $confirmPassword;
}
