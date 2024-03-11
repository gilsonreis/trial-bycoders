<?php

namespace App\UseCases\Users;

use App\Repositories\User\UserRepositoryInterface;

class ListAllCustomersUseCase
{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    public function handle(): ?array
    {
        return $this->userRepository->getAllCustomers();
    }
}
