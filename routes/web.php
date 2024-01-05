<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ProfileController;

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



// Route::get('/get-users', [UserController::class, 'getUsers']);


Route::post('/index', [UserController::class, 'index'])->name('user.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');
Route::post('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');

Route::post('upsubs', [UploadController::class, 'upload'])->name('upload');




Route::get('/subs', function () {
    return view('subs');
})->name('subs');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';