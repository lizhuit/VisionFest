<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\Models\articulos;
use App\Models\clientes;
use App\Models\colores;
use App\Models\cotizaciones;
use App\Models\estados;
use App\Models\categorias;


class VisionController extends Controller
{
        public function index() {
            return view('home');
        }
        // VisionController.php
        public function homeDal() {
            return view('homeDaltoni');
        }


        public function cotizacion() {
            return view('cotizacion');
        }

        /*public function galeria() {
            return view('galerias.galeria');
        }
            */
            /*
            public function galeria()
            {
                $categorias = categorias::all(); // Obtiene todas las categorías como objetos Eloquent
                $articulos = articulos::with(['color', 'categoria'])->get();
                
                return view('galeria.galeria', compact('articulos', 'categorias'));
            }
            */
            public function galeria()
            {
                $categorias = categorias::all(); 
                $articulos = articulos::with(['color', 'categoria'])->get();

                foreach ($articulos as $articulo) {
                    // Normaliza el nombre de la categoría para la ruta
                    $subcarpeta = strtolower(str_replace([' ', 'ñ', 'áéíóú'], ['-', 'n', 'aeiou'], $articulo->categoria->nombreCategoria));
                    
                    // Asegura que el nombre del archivo tenga extensión
                    $nombreArchivo = $articulo->foto;
                    if (!pathinfo($nombreArchivo, PATHINFO_EXTENSION)) {
                        $extensiones = ['.jpg', '.jpeg', '.png', '.webp'];
                        foreach ($extensiones as $ext) {
                            if (Storage::disk('public')->exists('articulos/'.$subcarpeta.'/'.$nombreArchivo.$ext)) {
                                $nombreArchivo .= $ext;
                                break;
                            }
                        }
                    }
                    
                    $rutaImagen = 'articulos/'.$subcarpeta.'/'.$nombreArchivo;

                    if (Storage::disk('public')->exists($rutaImagen)) {
                        $articulo->rutaImagen = Storage::url($rutaImagen);
                    } else {
                        $articulo->rutaImagen = asset('img/default-image.jpg');
                        \Log::error("Imagen no encontrada: ".$rutaImagen."\nRuta completa: ".storage_path('app/public/'.$rutaImagen));
                    }
                }

                return view('galeria.galeria', compact('articulos', 'categorias'));
            }
            
/*
            public function galeriaCategoria($categoria)
            {
                $categorias = categorias::all();
                $articulos = articulos::whereHas('categoria', function($query) use ($categoria) {
                    $query->where('nombreCategoria', $categoria);
                })->with(['color', 'categoria'])->get();
                
                return view('galeria.categoria', [
                    'articulos' => $articulos,
                    'categoria' => $categoria,
                    'categorias' => $categorias
                ]);
            }
         
        */

        public function galeriaCategoria($categoria)
{
    $categorias = categorias::all();
    $articulos = articulos::whereHas('categoria', function($query) use ($categoria) {
        $query->where('nombreCategoria', $categoria);
    })->with(['color', 'categoria'])->get();

    // Generar la ruta de imagen pública
    foreach ($articulos as $articulo) {
        $subcarpeta = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
        $rutaImagen = 'articulos/' . $subcarpeta . '/' . $articulo->foto;

        // Validar si el archivo existe
        if (Storage::exists($rutaImagen)) {
            $articulo->rutaImagen = Storage::url($rutaImagen);
        } else {
            $articulo->rutaImagen = asset('img/imagen-no-encontrada.png'); // Imagen por defecto
        }
    }

    return view('galeria.categoria', [
        'articulos' => $articulos,
        'categoria' => $categoria,
        'categorias' => $categorias
    ]);
}
            /*public function galeriaCategoria($categoria)
            {
                $categorias = categorias::all();
                $articulos = articulos::with(['color', 'categoria'])
                                    ->whereHas('categoria', function($query) use ($categoria) {
                                        $query->where('nombreCategoria', $categoria);
                                    })
                                    ->get();
                
                return view('galeria.categoria', compact('articulos', 'categorias'));
            }*/
        
            public function detalleArticulo($id)
            {
                $articulo = articulos::with(['color', 'categoria'])->findOrFail($id);
                return view('galeria.detalle', compact('articulo'));
            }
        





        public function galeriaDal(){
            return view('galeria.galeriaDaltoni');
        }
        public function configuracion (){
            return view('configuracion');
        }

        public function correo(){
            return view('correo');
        }
        
}
