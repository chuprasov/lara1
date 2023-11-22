<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// dd(url());
// dd(request()->all());


Route::get('/locale/{locale}', [LocaleController::class, 'setLocale'])->name('locale');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {


    Route::resource('cars', CarController::class);
    Route::get('/cars/{car}/before-destroy', [CarController::class, 'beforeDestroy'])->name('cars.before-destroy');
    Route::get('/cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore');

    Route::resource('brands', BrandController::class);
    Route::get('/brands/{brand}/before-destroy', [BrandController::class, 'beforeDestroy'])->name('brands.before-destroy');

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::post('/image/upload', [ImageController::class, 'upload'])->name('image.upload');
});
