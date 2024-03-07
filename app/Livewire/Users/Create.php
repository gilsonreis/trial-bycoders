<?php

namespace App\Livewire\Users;

use App\Exceptions\UseCaseException;
use App\Livewire\Forms\Users\CreateUserForm;
use App\UseCases\Users\CreateNewUserUseCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create new User')]
class Create extends Component
{
    use LivewireAlert;

    public CreateUserForm $form;

    public function saveNewUser(CreateNewUserUseCase $createNewUserUseCase)
    {
        $this->validate();

        try {

            $passwordHash = Hash::make($this->form->password);
            $this->form->password = $passwordHash;

            $createNewUserUseCase->handle($this->form->except('newPassword'));
            $this->flash(
                'success',
                'All done!',
                ['text' => 'User successfully created.'],
                route('dashboard')
            );
        } catch (UseCaseException $exception) {
            $this->alert(
                'error',
                'Oppsss!',
                ['text' => $exception->getMessage()]
            );
        }
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
