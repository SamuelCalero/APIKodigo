<?php
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\RoomController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::post('/user','store');
    Route::get('/user/{id}','show');
    Route::put('/user/{id}','update');
    Route::delete('/user/{id}','destroy');
});

Route::controller(ReservationController::class)->group(function () {
    Route::get('/reservations','index');
    Route::post('/reservation','store');
    Route::get('/reservation/{id}','show');
    Route::put('/reservation/{id}','update');
    Route::delete('/reservation/{id}','destroy');
    
});
Route::controller(ServiceController::class)->group(function(){
    Route::get('/services', 'index');
    Route::post('/service', 'store');
    Route::get('/service/{id}', 'show');
    Route::put('/service/{id}', 'update');
    Route::delete('/service/{id}', 'destroy');
});
Route::controller(RoomController::class)->group(function(){
    Route::get('/rooms','index');
    Route::post('/room','store');
    Route::put('/room/{id}','update');
    Route::delete('/room/{id}','destroy');
    Route::get('/room/{id}','show');
});