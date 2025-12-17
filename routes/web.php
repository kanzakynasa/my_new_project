<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ATH;

// Halaman video kalau sudah login
Route::get('/video', [VideoController::class, 'index'])
    ->middleware('auth')
    ->name('videos.index');    

Route::get('/videos/{video}', [VideoController::class, 'show'])
    ->middleware('auth')
    ->name('videos.show'); 

// route admin
Route::get('/admin/videos/create', [VideoController::class, 'create'])
    ->middleware('auth')
    ->name('videos.create');

Route::post('/admin/videos', [VideoController::class, 'store'])
    ->middleware('auth')
    ->name('videos.store');
// DELETE
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
// ngecek autentikasi
Route::get('/', function(){return view('videos.login');})->name('login');
Route::post('/login', [ATH::class, 'login'])->name('login.post');
// Route::post('/logout', [ATH::class, 'logout'])->name('logout');
Route::get('/register', [ATH::class, 'showRegister'])->name('register');
Route::post('/register', [ATH::class, 'register']);
Route::get('/categories/{slug}', [VideoController::class, 'byCategory'])->name('categories.show');
Route::middleware('auth')->group(function () {
    Route::get('/logout', [ATH::class, 'logout'])->name('logout');
});