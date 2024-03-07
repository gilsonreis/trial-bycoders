<?php

namespace App\Repositories\UserInfos;

interface UserInfosRepositoryInterface
{
    public function saveUserInfoProfile(array $userProfile, int $userId): ?bool;
}
