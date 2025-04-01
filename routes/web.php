<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisionController;

use App\Http\Controllers\CorreoController;

Route::get('home', [VisionController::class, 'index'])->name('home');
Route::get('homeDal', [VisionController::class, 'homeDal'])->name('homeDal');
Route::get('/configuracion', [VisionController::class, 'configuracion'])->name('configuracion');
Route::get('/correo', [VisionController::class, 'correo'])->name('correo');


Route::get('/enviarcorreo', [CorreoController::class, 'enviarCorreo'])->name('correoj');

//-----------------------------------Galeria Normal

Route::get('/galeria', [VisionController::class, 'galeria'])->name('galeria');
Route::get('/galeria/{categoria}', [VisionController::class, 'galeriaCategoria'])->name('galeria.categoria');
Route::get('/articulo-normal/{id}', [VisionController::class, 'detalleArticulo'])->name('articulo.detalleN');

// Rutas COTIZACIÓN normal
Route::get('/cotizacion', [VisionController::class, 'cotizacion'])->name('cotizacion');
Route::post('/agregar-cotizacion-normal', [VisionController::class, 'agregarCotizacion'])->name('agregar.cotizacion');
Route::delete('/eliminar-cotizacion/{index}', [VisionController::class, 'eliminarCotizacion'])->name('eliminar.cotizacion');
Route::post('/cancelar-cotizacion', [VisionController::class, 'cancelarCotizacion'])->name('cancelar.cotizacion');
//-----------------------------------Galeria DALTONICO

//detalles
Route::get('/galeriaDal', [VisionController::class, 'galeriaDal'])->name('galeriaDal');
Route::get('/galeriaDal/{categoria}', [VisionController::class, 'galeriaCategoriaDal'])->name('galeria.categoriaDal');
Route::get('/articulo/{id}', [VisionController::class, 'detalleArticuloDal'])->name('articulo.detalleDal');
Route::post('/agregar-cotizacion', [VisionController::class, 'agregarCotizacionDal  '])->name('galeria.cotizacionDal');

//cotizar
Route::get('/cotizacionDal', [VisionController::class, 'cotizacionDal'])->name('cotizacionDal');
Route::post('/agregar-cotizacion', [VisionController::class, 'agregarCotizacionDal'])->name('agregar.cotizacionDal');
Route::delete('/eliminar-cotizacionDal/{index}', [VisionController::class, 'eliminarCotizacionDal'])->name('eliminar.cotizacionDal');
Route::post('/cancelar-cotizacionDal', [VisionController::class, 'cancelarCotizacionDal'])->name('cancelar.cotizacionDal');



