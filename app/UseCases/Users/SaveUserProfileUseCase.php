<?php

namespace App\UseCases\Users;

use App\Exceptions\UseCaseException;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserInfos\UserInfosRepositoryInterface;

class SaveUserProfileUseCase
{
    public function __construct(
        private readonly UserRepositoryInterface      $userRepository,
        private readonly UserInfosRepositoryInterface $userInfosRepository
    )
    {
    }

    public function handle(array $userProfile, int $userId): bool
    {
        $user = [
            'name' => $userProfile['name'],
            'email' => $userProfile['email']
        ];

        $userWasSaved = $this->userRepository->saveUserProfile($user, $userId);

        if (!$userWasSaved) {
            throw new UseCaseException('User cannot be saved');
        }

        unset($userProfile['name'], $userProfile['email']);
        $userInfoWasSaved = $this->userInfosRepository->saveUserInfoProfile($userProfile, $userId);

        if (!$userInfoWasSaved) {
            throw new UseCaseException('User Infos cannot be saved');
        }

        return true;
    }
}
