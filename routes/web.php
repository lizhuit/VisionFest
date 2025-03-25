<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisionController;

Route::get('home', [VisionController::class, 'index'])->name('home');
Route::get('/cotizacion', [VisionController::class, 'cotizacion'])->name('cotizacion');
Route::get('/galeria', [VisionController::class, 'galeria'])->name('galeria');

