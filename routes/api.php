<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\UploadController;

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

Route::post('/register', [AuthController::class, 'register'])->name('register.api');
Route::post('/login', [AuthController::class, 'login'])->name('login.api');
Route::post('/uploads', [UploadController::class, 'store'])->name('uploads.api');
Route::get('/uploads', [UploadController::class, 'index']);
Route::get('/uploads/{id}', [UploadController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::get('/uploads/{id}', [UploadController::class, 'show']);
    Route::put('/uploads/{id}', [UploadController::class, 'update']);
    Route::delete('/uploads/{id}', [UploadController::class, 'destroy']);

    return $request->user();
});
