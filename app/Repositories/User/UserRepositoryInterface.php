<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function saveUserProfile(array $userProfile, int $userId): bool;

    public function changeUserPassword(string $newPassword, int $userId): bool;

    public function listAll(?string $search = null);

    public function createNewUser(array $user): bool;

    public function getAllSellers(): ?array;

    public function getAllCustomers(): ?array;


}
