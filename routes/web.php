<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\WikiController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class, 'check'])->name("mainkkk");

/*
Route::get("/create_admin", function () {
    return view("wiki.create_admin");
});
*/

/*
Route::get('/setup/step1', [SetupController::class, 'step1'])->name('setup.step1');
Route::post('/setup/step1', [SetupController::class, 'handleStep1'])->name('handleStep1');

Route::get('/setup/step2', [SetupController::class, 'step2'])->name('setup.step2');
Route::post('/setup/step2', [SetupController::class, 'handleStep2']);

Route::get('/setup/step3', [SetupController::class, 'step3'])->name('setup.step3');
Route::post('/setup/step3', [SetupController::class, 'handleStep3']);

Route::get('/setup/step4', [SetupController::class, 'step4'])->name('setup.step4');
Route::post('/setup/step4', [SetupController::class, 'handleStep4']);

Route::get('/setup/complete', [SetupController::class, 'complete'])->name('setup.complete');
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/wiki/creator', [WikiController::class, 'create'])->middleware('auth');

Route::get('/about', function () {
    return view('about');
});

require __DIR__.'/auth.php';
