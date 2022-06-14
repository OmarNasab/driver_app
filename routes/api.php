<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post("signIn", [ApiController::class,"SignInRequest"]);
Route::post("addExpense", [ApiController::class,"addExpense"]);
Route::post("totalExpenses", [ApiController::class,"getTotalExpensesForOneDriver"]);
Route::get("getCurrentMission/{id}",[ApiController::class,'getCurrentMission']);
Route::post("finishDestination/{id}",[ApiController::class,'finishDestination']);
Route::post("finishTrip/{id}",[ApiController::class,'finishTrip']);
Route::get("totalTrips/{id}",[ApiController::class,'totalTrips']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
