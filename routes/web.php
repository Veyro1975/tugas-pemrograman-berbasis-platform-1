<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', [BukuController::class, 'index']);  

Route::get('/create', [BukuController::class, 'create']);

Route::get('/edit/{id}', [BukuController::class, 'edit']);



Route::resource('books', BukuController::class);