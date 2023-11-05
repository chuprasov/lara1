<?php

use App\Models\Car;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreignIdFor(Brand::class);
        });

        $brands = Brand::all();
        foreach ($brands as $brand) {
            Car::where('brand', $brand->title)->update(['brand_id' => $brand->id]);
        }
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('brand_id');
        });
    }
};
