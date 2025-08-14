<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');
Route::delete('/filmes/{filme}/delete', [FilmeController::class, 'destroy'])->name('filmes.destroy');
Route::get('/filmes/filtrar', [FilmeController::class, 'filtrar'])->name('filmes.filtrar');
Route::get('/filmes/create', [FilmeController::class, 'create'])->name('filmes.create');
Route::post('/filmes', [FilmeController::class, 'store'])->name('filmes.store');
Route::get('/filmes/edit/{filme}', [FilmeController::class, 'edit'])->name('filmes.edit');
Route::put('/filmes/edit', [FilmeController::class, 'edit'])->name('filmes.editGravar');
Route::get('/filmes/{id}', [FilmeController::class, 'show'])->name('filmes.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categorias', CategoriaController::class);
Route::post('/filmes/{filme}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
require __DIR__.'/auth.php';
