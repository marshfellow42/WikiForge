<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MarkdownController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
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

Route::get('/wiki/info', [WikiController::class, 'show'])->middleware('auth');
Route::get('/wiki/creator', [WikiController::class, 'create'])->middleware('auth')->name('wiki.creator');
Route::get('/wiki/users', [WikiController::class, 'observe'])->middleware('auth')->name('wiki.users');

Route::get('/wiki/create_page', [WikiController::class, 'create_new_page'])->middleware('auth');
Route::get('/wiki/edit_page/{id}', [WikiController::class, 'edit_page'])->middleware('auth')->name('pages.edit_page');

Route::delete('/wiki/users/{id}', [WikiController::class, 'destroy_user'])->name('users.destroy');
Route::delete('/wiki/creator/{id}', [WikiController::class, 'destroy_page'])->name('pages.destroy');

Route::post('/wiki/save', [PageController::class, 'store'])->name('wiki.save');
Route::put('/wiki/update/{id}', [PageController::class, 'update'])->name('wiki.update');

Route::get('/about', function () {
    return view('about');
});

Route::post('/upload-image', function (Request $request) {
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = urlencode(time() . '_' . $image->getClientOriginalName());
        $image->move(public_path('uploads'), $imageName);

        return response()->json([
            'url' => asset('uploads/' . $imageName) // Return public URL
        ]);
    }

    return response()->json(['error' => 'No image uploaded'], 400);
});

require __DIR__.'/auth.php';

Route::get('/{slug}', [MarkdownController::class, 'show']);
