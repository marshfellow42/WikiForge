<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WikiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'makelogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register']);
Route::post('/register', [LoginController::class, 'store']);
Route::get('/wiki/creator', [WikiController::class, 'create']);
Route::get('/profile/{profile?}', [ProfileController::class, 'enter_profile']);


















// require __DIR__.'/auth.php';