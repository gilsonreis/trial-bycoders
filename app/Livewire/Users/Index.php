<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\UseCases\Users\ListAllUsersUseCase;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Users')]
class Index extends Component
{
    use WithPagination;

    #[Url(keep: true)]
    public ?string $search = null;

    public function render(ListAllUsersUseCase $listAllUsersUseCase)
    {
        return view('livewire.users.index', [
            'users' => $listAllUsersUseCase->handle($this->search)
        ]);
    }
}
