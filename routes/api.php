<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CropController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    //public api routes
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);


//public crop API routes
Route::get('/crops', [CropController::class, 'index']);
Route::get('/crop/{id}', [CropController::class, 'show']);
Route::post('/crops', [CropController::class, 'store']);
Route::put('/crop/{id}/update', [CropController::class, 'update']);
Route::delete('/crop/{id}/delete', [CropController::class, 'destroy']);

//private api routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}/update', [StudentController::class, 'update']);
    Route::delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
//public api route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//logout route private
//Axioa intercepter