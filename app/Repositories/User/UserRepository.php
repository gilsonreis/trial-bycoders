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

    public function changeUserPassword(string $newPassword, int $userId): bool
    {
        $user = User::find($userId);
        $user->password = $newPassword;
        return $user->save();
    }

    public function listAll(?string $search = null)
    {
        $query = User::query();
        $query->join('user_infos', 'users.id', 'user_infos.user_id');

        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                $query->where('users.name', 'LIKE', "%{$search}%")
                    ->orWhere('users.email', 'LIKE', "%{$search}%")
                    ->orWhere('user_infos.phone', 'LIKE', "%{$search}%")
                    ->orWhere('user_infos.city', 'LIKE', "%{$search}%");
            });
        }

        return $query->paginate();
    }
}
