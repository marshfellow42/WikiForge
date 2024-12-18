<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\CardContent;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CardController::class, 'showCards']);

Route::get('/add-card', function () {
    return view('welcome');
});

Route::post('/add-card/upload', function (Request $request) {
    try {
        $file = $request->file('upload_file'); // Adjust to your file input name
        $content = file_get_contents($file->getRealPath()); // Get file content

        // Create a new content record with only name and content
        CardContent::create([
            'name' => $file->getClientOriginalName(),
            'content' => $content, // Adding only content field
        ]);

        return redirect('/admin')->with('success', 'Arquivo enviado com sucesso!');
    } catch (\Exception $e) {
        return redirect('/admin')->with('error', 'Upload do arquivo falhou.');
    }
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
