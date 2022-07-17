<?php

use App\Http\Controllers\DashboardController;
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
    return redirect("login");
});


Route::get('/dashboard', [DashboardController::class,"index"])->middleware(['auth'])->name('dashboard');

Route::resource("driver", DriverController::class)->middleware(['auth']);
Route::resource("map", MapController::class)->middleware(['auth']);
Route::resource("expense", ExpenseController::class)->middleware(['auth']);
Route::resource("mission", MissionController::class)->middleware(['auth']);
Route::resource("role", RoleController::class)->middleware(['auth']);
Route::resource("user", UserController::class)->middleware(['auth']);
Route::resource("vehicle", VehicleController::class)->middleware(['auth']);
Route::get("expense/{id}/download",[ExpenseController::class,"downloadImage"])->name("downloadImage")->middleware(['auth']);
Route::get("expense/{id}/verify/{status}",[ExpenseController::class,"verify"])->name("expenseVerify")->middleware(['auth']);
Route::post("mission/ajax_store",[MissionController::class,"ajax_store"])->middleware(['auth']);
Route::put("driver/{id}/changePassword",[DriverController::class,"changePassword"])->name("driver.changePassword");
Route::put("driver/{id}/changeImage",[DriverController::class,"changeImage"])->name("driver.changeImage");
Route::put("vehicle/{id}/changeFrontPhoto",[VehicleController::class,"changeFrontPhoto"])->name("vehicle.changeFrontPhoto");
Route::put("vehicle/{id}/changeBackPhoto",[VehicleController::class,"changeBackPhoto"])->name("vehicle.changeBackPhoto");
Route::put("user/{id}/changePassword",[UserController::class,"changePassword"])->name("user.changePassword");
Route::get("user/{id}/editPassword",[UserController::class,"editPassword"])->name("user.editPassword");




require __DIR__.'/auth.php';
