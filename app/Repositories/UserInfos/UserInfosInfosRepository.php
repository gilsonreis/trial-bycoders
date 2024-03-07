<?php

namespace App\Repositories\UserInfos;

use App\Models\UserInfo;

class UserInfosInfosRepository implements UserInfosRepositoryInterface
{
    public function saveUserInfoProfile(array $userProfile, int $userId): ?bool
    {
        $userInfo = UserInfo::where('user_id', $userId)?->first();
        $userInfo->fill($userProfile);
        return $userInfo->save();
    }
}
