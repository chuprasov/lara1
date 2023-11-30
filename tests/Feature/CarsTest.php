<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Car;


class CarsTest extends TestCase
{
    public function test_create_car(): void
    {
        $user = User::factory()->make();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($user)->post(route('cars.store'), [
            "brand_id" => rand(1,4),
            "model" => 'q' . Str::random(3),
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
