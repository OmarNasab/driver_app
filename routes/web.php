<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource("driver", DriverController::class)->middleware("role:add_driver");
Route::resource("map", MapController::class);
Route::resource("expense", ExpenseController::class);
Route::resource("mission", MissionController::class);
Route::resource("role", RoleController::class);
Route::resource("user", UserController::class);
Route::resource("vehicle", VehicleController::class);
Route::get("expense/{id}/download",[ExpenseController::class,"downloadImage"])->name("downloadImage");
Route::get("expense/{id}/verify/{status}",[ExpenseController::class,"verify"])->name("expenseVerify");
Route::post("mission/ajax_store",[MissionController::class,"ajax_store"]);


require __DIR__.'/auth.php';
