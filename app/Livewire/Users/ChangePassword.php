<?php

namespace App\Livewire\Users;

use App\Exceptions\UseCaseException;
use App\Livewire\Forms\Users\ChangePasswordForm;
use App\UseCases\Users\ChangeUserPasswordUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Change Password')]
class ChangePassword extends Component
{
    use LivewireAlert;

     public ChangePasswordForm $form;

     public function saveChangePassword(ChangeUserPasswordUseCase $changeUserPasswordUseCase)
     {
         $this->validate();

         try {
             $newPassword = Hash::make($this->form->password);
             $changeUserPasswordUseCase->handle($newPassword, Auth::user()->id);
             $this->flash(
                 'success',
                 'All done!',
                 ['text' => 'Password successfully updated.'],
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
        return view('livewire.users.change-password');
    }
}
