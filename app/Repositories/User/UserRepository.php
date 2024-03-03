<?php

namespace App\Repositories\User;


use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function saveUserProfile(array $userProfile, int $userId): bool
    {
        $user = User::find($userId);
        $user->fill($userProfile);
        return $user->save();
    }
}
