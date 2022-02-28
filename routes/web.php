<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/car/create', function () { return view('car.create'); })->name('create_car');

    Route::post('/car/store', [CarController::class, "store"])->name('store_car');

    Route::get('/car/edit/{car}', [CarController::class, "edit"])->name("edit_car");

    Route::post('/car/update/{car}', [CarController::class, "update"])->name("update_car");

    Route::get('/car/destroy/{car}', [CarController::class, "destroy"])->name("destroy_car");
    
});

Route::get('/cars', [CarController::class, "index"])->name('cars');

require __DIR__.'/auth.php';
