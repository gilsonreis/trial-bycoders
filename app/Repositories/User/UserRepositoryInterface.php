<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function saveUserProfile(array $userProfile, int $userId): bool;

    public function changeUserPassword(string $newPassword, int $userId): bool;
}
