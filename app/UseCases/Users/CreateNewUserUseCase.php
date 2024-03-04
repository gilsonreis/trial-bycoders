<?php

namespace App\UseCases\Users;

use App\Exceptions\UseCaseException;
use App\Repositories\User\UserRepositoryInterface;

class CreateNewUserUseCase
{
    public function __construct(private readonly UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws UseCaseException
     */
    public function handle(array $user): bool
    {
        $userCreated = $this->userRepository->createNewUser($user);

        if (!$userCreated) {
            throw new UseCaseException('User can not be created!');
        }

        return true;
    }
}
