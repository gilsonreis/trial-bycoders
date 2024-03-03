<?php

namespace App\UseCases\Users;

use App\Repositories\User\UserRepositoryInterface;

class ListAllUsersUseCase
{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    public function handle(?string $search = null)
    {
        return $this->userRepository->listAll($search);
    }
}
