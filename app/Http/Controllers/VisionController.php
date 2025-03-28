<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            public function galeria()
            {
                $categorias = categorias::all(); // Obtiene todas las categorías como objetos Eloquent
                $articulos = articulos::with(['color', 'categoria'])->get();
                
                return view('galeria.galeria', compact('articulos', 'categorias'));
            }

            public function galeriaCategoria($categoria)
            {
                $categorias = categorias::all();
                $articulos = articulos::whereHas('categoria', function($query) use ($categoria) {
                    $query->where('nombreCategoria', $categoria);
                })->with(['color', 'categoria'])->get();
                
                return view('galeria-categoria', [
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
                return view('detalle-articulo', compact('articulo'));
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
