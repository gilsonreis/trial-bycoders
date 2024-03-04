<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carBrands = [
            ['name' => 'Toyota'],
            ['name' => 'Honda'],
            ['name' => 'Ford']
        ];

        CarBrand::query()->truncate();

        foreach($carBrands as $brand) {
            (new CarBrand())->fill($brand)->save();
        }
    }
}
