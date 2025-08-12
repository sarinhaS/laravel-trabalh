<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');
Route::get('/filmes/create', [FilmeController::class, 'create'])->name('filmes.create');
Route::post('/filmes', [FilmeController::class, 'store'])->name('filmes.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categorias', CategoriaController::class);

require __DIR__.'/auth.php';
