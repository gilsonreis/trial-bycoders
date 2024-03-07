<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carModels = [
            ['name' => 'Camry', 'brand_id' => 1],
            ['name' => 'Corolla', 'brand_id' => 1],
            ['name' => 'Rav4', 'brand_id' => 1],
            ['name' => 'Accord', 'brand_id' => 2],
            ['name' => 'Civic', 'brand_id' => 2],
            ['name' => 'CR-V', 'brand_id' => 2],
            ['name' => 'Fusion', 'brand_id' => 3],
            ['name' => 'Escape', 'brand_id' => 3],
            ['name' => 'Explorer', 'brand_id' => 3],
            ['name' => 'Mustang', 'brand_id' => 3],
        ];

        CarModel::query()->truncate();

        foreach ($carModels as $model) {
            (new CarModel())->fill($model)->save();
        }

    }
}
