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
                
                // Generar ruta de imagen igual que en galeria()
                $subcarpeta = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
                $nombreArchivo = $articulo->foto;
                
                // Si el nombre no tiene extensión, asumir .png (según tus imágenes)
                if (!pathinfo($nombreArchivo, PATHINFO_EXTENSION)) {
                    $nombreArchivo .= '.png';
                }
                
                $rutaImagen = 'articulos/' . $subcarpeta . '/' . $nombreArchivo;
                
                $articulo->rutaImagen = Storage::disk('public')->exists($rutaImagen)
                    ? Storage::url($rutaImagen)
                    : asset('img/default-image.jpg');

                return view('galeria.detalle', compact('articulo'));
            }
        


        public function galeriaDal()
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

            return view('galeria.galeriaDaltoni', compact('articulos', 'categorias'));
        }


        public function configuracion (){
            return view('configuracion');
        }

        public function correo(){
            return view('correo');
        }




        public function cotizacion(Request $request)
        {
            // Obtener la cotización actual de la sesión
            $cotizacion = $request->session()->get('cotizacion', []);
            
            // Calcular total
            $total = 0;
            foreach ($cotizacion as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            
            return view('cotizacion', [
                'productosCotizacion' => $cotizacion,
                'total' => $total
            ]);
        }

        public function agregarCotizacion(Request $request)
        {
            $request->validate([
                'idArticulo' => 'required|exists:articulos,idArticulo',
                'cantidad' => 'required|integer|min:1'
            ]);
            
            // Obtener el artículo
            $articulo = articulos::findOrFail($request->idArticulo);
            
            // Obtener cotización actual de la sesión
            $cotizacion = $request->session()->get('cotizacion', []);
            
            // Verificar si el artículo ya está en la cotización
            $encontrado = false;
            foreach ($cotizacion as &$item) {
                if ($item['id'] == $articulo->idArticulo) {
                    $item['cantidad'] += $request->cantidad;
                    $encontrado = true;
                    break;
                }
            }
            
            // Si no estaba, agregarlo
            if (!$encontrado) {
                $cotizacion[] = [
                    'id' => $articulo->idArticulo,
                    'nombre' => $articulo->nombreArticulo,
                    'precio' => $articulo->costoArticulo,
                    'cantidad' => $request->cantidad
                ];
            }
            
            // Guardar en sesión
            $request->session()->put('cotizacion', $cotizacion);
            
            return redirect()->route('cotizacion')
                ->with('success', 'Artículo agregado a la cotización');
        }

        public function eliminarCotizacion(Request $request, $index)
        {
            $cotizacion = $request->session()->get('cotizacion', []);
            
            if (isset($cotizacion[$index])) {
                unset($cotizacion[$index]);
                $cotizacion = array_values($cotizacion); // Reindexar array
                $request->session()->put('cotizacion', $cotizacion);
            }
            
            return redirect()->route('cotizacion')
                ->with('success', 'Artículo eliminado de la cotización');
        }

        public function cancelarCotizacion(Request $request)
        {
            $request->session()->forget('cotizacion');
            
            return redirect()->route('cotizacion')
                ->with('success', 'Cotización cancelada');
        }
        
}
