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
            ['model_id' => 1, 'color' => 'Silver', 'price' => 48000],
            ['model_id' => 2, 'color' => 'Blue', 'price' => 52000],
            ['model_id' => 3, 'color' => 'Black', 'price' => 45000],
            ['model_id' => 4, 'color' => 'Red', 'price' => 50000],
            ['model_id' => 5, 'color' => 'White', 'price' => 48000],
            ['model_id' => 6, 'color' => 'Gray', 'price' => 52000],
            ['model_id' => 7, 'color' => 'Yellow', 'price' => 49000],
            ['model_id' => 8, 'color' => 'Orange', 'price' => 47000],
            ['model_id' => 9, 'color' => 'Purple', 'price' => 53000],
            ['model_id' => 10, 'color' => 'Green', 'price' => 50000],
            ['model_id' => 1, 'color' => 'Blue', 'price' => 52000],
            ['model_id' => 2, 'color' => 'Black', 'price' => 45000],
            ['model_id' => 3, 'color' => 'Red', 'price' => 50000],
            ['model_id' => 4, 'color' => 'White', 'price' => 48000],
            ['model_id' => 5, 'color' => 'Gray', 'price' => 52000],
            ['model_id' => 6, 'color' => 'Yellow', 'price' => 49000],
            ['model_id' => 7, 'color' => 'Orange', 'price' => 47000],
            ['model_id' => 8, 'color' => 'Purple', 'price' => 53000],
            ['model_id' => 9, 'color' => 'Green', 'price' => 50000],
            ['model_id' => 10, 'color' => 'Blue', 'price' => 52000],
            ['model_id' => 1, 'color' => 'Black', 'price' => 45000],
            ['model_id' => 2, 'color' => 'Red', 'price' => 50000],
            ['model_id' => 3, 'color' => 'White', 'price' => 48000],
            ['model_id' => 4, 'color' => 'Gray', 'price' => 52000],
            ['model_id' => 5, 'color' => 'Yellow', 'price' => 49000],
            ['model_id' => 6, 'color' => 'Orange', 'price' => 47000],
            ['model_id' => 7, 'color' => 'Purple', 'price' => 53000],
            ['model_id' => 8, 'color' => 'Green', 'price' => 50000],
            ['model_id' => 9, 'color' => 'Blue', 'price' => 52000],
            ['model_id' => 10, 'color' => 'Black', 'price' => 45000],
        ];

        CarDetail::query()->truncate();

        foreach ($carDetails as $detail) {
            (new CarDetail())->fill($detail)->save();
        }
    }
}
