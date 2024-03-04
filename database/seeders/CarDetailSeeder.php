<?php

namespace Database\Seeders;

use App\Models\CarDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carDetails = [
            ['model_id' => 1, 'year' => 2022, 'color' => 'Silver', 'price' => 48000],
            ['model_id' => 2, 'year' => 2021, 'color' => 'Blue', 'price' => 52000],
            ['model_id' => 3, 'year' => 2020, 'color' => 'Black', 'price' => 45000],
            ['model_id' => 4, 'year' => 2022, 'color' => 'Red', 'price' => 50000],
            ['model_id' => 5, 'year' => 2021, 'color' => 'White', 'price' => 48000],
            ['model_id' => 6, 'year' => 2022, 'color' => 'Gray', 'price' => 52000],
            ['model_id' => 7, 'year' => 2021, 'color' => 'Yellow', 'price' => 49000],
            ['model_id' => 1, 'year' => 2020, 'color' => 'Orange', 'price' => 47000],
            ['model_id' => 2, 'year' => 2022, 'color' => 'Purple', 'price' => 53000],
            ['model_id' => 3, 'year' => 2021, 'color' => 'Green', 'price' => 50000],
            ['model_id' => 4, 'year' => 2020, 'color' => 'Blue', 'price' => 48000],
            ['model_id' => 5, 'year' => 2022, 'color' => 'Black', 'price' => 52000],
            ['model_id' => 6, 'year' => 2021, 'color' => 'Red', 'price' => 45000],
            ['model_id' => 7, 'year' => 2020, 'color' => 'White', 'price' => 50000],
            ['model_id' => 1, 'year' => 2022, 'color' => 'Gray', 'price' => 47000],
            ['model_id' => 2, 'year' => 2021, 'color' => 'Yellow', 'price' => 49000],
            ['model_id' => 3, 'year' => 2020, 'color' => 'Orange', 'price' => 53000],
            ['model_id' => 4, 'year' => 2022, 'color' => 'Purple', 'price' => 50000],
            ['model_id' => 5, 'year' => 2021, 'color' => 'Green', 'price' => 48000],
            ['model_id' => 6, 'year' => 2020, 'color' => 'Blue', 'price' => 52000],
        ];

        CarDetail::query()->truncate();

        foreach ($carDetails as $detail) {
            (new CarDetail())->fill($detail)->save();
        }
    }
}
