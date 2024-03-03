<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = app(Generator::class);

        $userAdmin = [
            'name' => 'Super Administrador',
            'email' => 'super@admin.com',
            'password' => Hash::make('password')
        ];
        $userSavedAdmin = new User();
        $userSavedAdmin->fill($userAdmin);
        $userSavedAdmin->save();

        $userSeller = [
            'name' => 'Seller 01',
            'email' => 'seller@admin.com',
            'password' => Hash::make('password')
        ];
        $userSavedSeller = new User();
        $userSavedSeller->fill($userSeller);
        $userSavedSeller->save();

        $userInfo = [
            'phone' => $faker->phoneNumber,
            'address' => $faker->streetAddress,
            'number' => $faker->buildingNumber,
            'city' => $faker->city,
            'state' => $faker->state
        ];

        $userInfo['user_id'] = $userSavedAdmin->id;
        (new UserInfo($userInfo))->save();

        $userInfo['user_id'] = $userSavedSeller->id;
        (new UserInfo($userInfo))->save();

        UserInfo::factory(10)->create();
    }
}
