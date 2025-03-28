<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisionController;
use App\Http\Controllers\CorreoController;

Route::get('home', [VisionController::class, 'index'])->name('home');
Route::get('homeDal', [VisionController::class, 'homeDal'])->name('homeDal');
Route::get('/cotizacion', [VisionController::class, 'cotizacion'])->name('cotizacion');
//Route::get('/galeria', [VisionController::class, 'galeria'])->name('galeria');
Route::get('/galeriaDal', [VisionController::class, 'galeriaDal'])->name('galeriaDal');
Route::get('/configuracion', [VisionController::class, 'configuracion'])->name('configuracion');
Route::get('/correo', [VisionController::class, 'correo'])->name('correo');


Route::get('/enviarcorreo', [CorreoController::class, 'enviarCorreo'])->name('correoj');

// web.php

Route::get('/galeria', [VisionController::class, 'galeria'])->name('galeria');
Route::get('/galeria/{categoria}', [VisionController::class, 'galeriaCategoria'])->name('galeria.categoria');
Route::get('/articulo/{id}', [VisionController::class, 'detalleArticulo'])->name('articulo.detalle');
Route::post('/agregar-cotizacion', [VisionController::class, 'agregarCotizacion'])->name('agregar.cotizacion');