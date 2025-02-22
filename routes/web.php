<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwitterController; // Ensure this is correctly imported
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('tweets', TwitterController::class);
Route::get('/dashboard', [TwitterController::class, 'index'])->name('dashboard');
Route::get('/tweets/{id}/edit', [TwitterController::class, 'edit'])->name('tweets.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
