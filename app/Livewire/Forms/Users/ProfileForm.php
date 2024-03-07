<?php

namespace App\Livewire\Forms\Users;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    #[Validate('required')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required')]
    public ?string $address;

    #[Validate('required')]
    public ?string $phone;

    #[Validate('required')]
    public ?string $number;

    #[Validate('required')]
    public ?string $city;

    #[Validate('required')]
    public ?string $state;

}
