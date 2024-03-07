<?php

namespace App\Repositories\UserInfos;

use App\Models\UserInfo;

class UserInfosInfosRepository implements UserInfosRepositoryInterface
{
    public function saveUserInfoProfile(array $userProfile, int $userId): ?bool
    {
        $userInfo = UserInfo::where('user_id', $userId)?->first();

        if (is_null($userInfo)) {
            $userInfo = new UserInfo();
            $userProfile['user_id'] = $userId;
        }

        $userInfo->fill($userProfile);
        return $userInfo->save();
    }
}
