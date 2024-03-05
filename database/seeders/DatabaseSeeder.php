<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sale;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::query()->truncate();
        UserInfo::query()->truncate();

        $faker = app(Generator::class);

        $userAdmin = [
            'name' => 'Super Administrador',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ];
        $userSavedAdmin = new User();
        $userSavedAdmin->fill($userAdmin);
        $userSavedAdmin->save();

        $userInfo = [
            'phone' => $faker->phoneNumber,
            'address' => $faker->streetAddress,
            'number' => $faker->buildingNumber,
            'city' => $faker->city,
            'state' => $faker->state
        ];

        $userInfo['user_id'] = $userSavedAdmin->id;
        (new UserInfo($userInfo))->save();

        for($i = 1; $i <= 10; $i++) { //create 10 sellers
            $userSeller = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'role' => 'seller'
            ];
            $userSavedSeller = new User();
            $userSavedSeller->fill($userSeller);
            $userSavedSeller->save();

            $userInfo = [
                'phone' => $faker->phoneNumber,
                'address' => $faker->streetAddress,
                'number' => $faker->buildingNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'user_id' => $userSavedSeller->id
            ];

            (new UserInfo($userInfo))->save();
        }

        UserInfo::factory(100)->create();

        $this->call([
            CarBrandSeeder::class,
            CarModelSeeder::class,
            CarDetailSeeder::class
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Sale::query()->truncate();
        Sale::factory(3000)->create();
    }
}
