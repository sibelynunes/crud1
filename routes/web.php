<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produto', function () {
    return view('produto');
})->middleware(['auth', 'verified'])->name('produto');


Route::middleware('auth')->group(function () {
    Route::get ('/produto', [ProdutoController::class, 'index'])->name('produtos.show');
    Route::get ('/produto/create', [ProdutoController::class, 'create'])->name('users.store');
    Route::get ('/produto/delete', [ProdutoController::class, 'delete'])->name('produtos.destroy');
    Route::get ('/produto/edit', [ProdutoController::class, 'edit'])->name('users.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
