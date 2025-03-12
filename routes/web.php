<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('users', UserController::class);
Route::resource('books', BookController::class);
Route::resource('products', ProductController::class);