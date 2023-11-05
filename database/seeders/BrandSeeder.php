<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;

class BrandSeeder extends Seeder
{

    public function run(): void
    {
        $brandsFromCars = Car::select('brand')->groupBy('brand')->get();
        foreach ($brandsFromCars as $brandFromCars) {
            Brand::create([
                'title' => $brandFromCars->brand
            ]);
        }

    }
}
