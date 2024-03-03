<?php

namespace App\Livewire\Users;

use App\Exceptions\UseCaseException;
use App\Livewire\Forms\Users\ProfileForm;
use App\UseCases\Users\SaveUserProfileUseCase;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profile')]
class Profile extends Component
{
    public ProfileForm $form;

    public function mount()
    {
        $user = Auth::user();
        $this->form->name = $user->name;
        $this->form->email = $user->email;
        $this->form->phone = $user->userInfo->phone;
        $this->form->address = $user->userInfo->address;
        $this->form->number = $user->userInfo->number;
        $this->form->city = $user->userInfo->city;
        $this->form->state = $user->userInfo->state;
    }

    public function saveProfileInfo(SaveUserProfileUseCase $saveUserProfileUseCase)
    {
        $this->validate();
        try {
            $saveUserProfileUseCase->handle($this->form->all(), Auth::user()->id);
            session()->flash('success', 'User Profile successfully updated.');
        } catch (UseCaseException $exception) {
            $this->addError('exception', $exception->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.users.profile');
    }
}
