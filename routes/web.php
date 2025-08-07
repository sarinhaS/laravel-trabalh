<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');
Route::post('/filmes/create', [FilmeController::class, 'create'])->name('filmes.create');Route::post('/filmes/store', [FilmeController::class, 'store'])->name('filmes.store');
Route::post('/filmes/store', [FilmeController::class, 'store'])->name('filmes.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
