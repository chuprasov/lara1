<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Car;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CarsTest extends TestCase
{
    // use DatabaseMigrations;
    // use RefreshDatabase;
    use DatabaseTransactions;

    public function test_create_brand(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->post(route('brands.store'), [
            "title" => 'b_' . Str::random(3),
        ]);

        $response->assertStatus(302);
    }

    public function test_create_car(): void
    {
        $user = User::factory()->make();
        $brandId = Brand::max('id');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($user)->post(route('cars.store'), [
            "brand_id" => $brandId, //rand(1, 4),
            "model" => 'm_' . Str::random(3),
            "vin" => Str::random(10),
            "transmission" => "1",
            "image" => null,
            "imagefile" => $file,
        ]);

        $response->assertStatus(302);
    }

    public function test_delete_car(): void
    {
        $user = User::factory()->make();
        $carId = Car::max('id');
        $car = Car::findOrFail($carId);
        $response = $this->actingAs($user)->delete(route('cars.destroy', $car));

        $response->assertStatus(302);
    }

    public function test_delete_trashed_car(): void
    {
        $user = User::factory()->make();
        $carId = Car::onlyTrashed()->max('id');
        $response = $this->actingAs($user)->get(route('cars.before-destroy', $carId));

        $response->assertStatus(302);
    }
}
