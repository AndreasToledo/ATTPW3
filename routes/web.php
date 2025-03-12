<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('users', UserController::class);
Route::resource('books', BookController::class);
Route::resource('products', ProductController::class);

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Mais específica vem primeiro
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show'); // Mais genérica depois
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');