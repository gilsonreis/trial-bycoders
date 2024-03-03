<?php

namespace App\UseCases\Users;

use App\Exceptions\UseCaseException;
use App\Repositories\User\UserRepositoryInterface;

class ChangeUserPasswordUseCase
{
    public function __construct(
        private readonly UserRepositoryInterface      $userRepository
    )
    {
    }

    /**
     * @throws UseCaseException
     */
    public function handle(string $newPassword, int $userId): bool
    {
        $passwordChanged = $this->userRepository->changeUserPassword($newPassword, $userId);

        if (!$passwordChanged) {
            throw new UseCaseException('Password cannot be changed!');
        }

        return true;
    }
}
