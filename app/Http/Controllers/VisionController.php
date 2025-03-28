<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\articulos;
use App\Models\clientes;
use App\Models\colores;
use App\Models\cotizaciones;
use App\Models\estados;
use App\Models\eventos;


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
                $categorias = ['Bodas', 'XV Años', 'Cumpleaños', 'Graduaciones', 'Bautizos'];
                $articulos = articulos::with('color')->get();
                
                return view('galeria.galeria', compact('articulos', 'categorias'));
            }
            
            public function galeriaCategoria($categoria)
            {
                $articulos = articulos::with('color')
                                    ->where('categoria', $categoria)
                                    ->get();
                
                return view('galeria.categoria', compact('articulos', 'categoria'));
            }
            
            public function detalleArticulo($id)
            {
                $articulo = articulos::with('color')->findOrFail($id);
                return view('articulo.detalle', compact('articulo'));
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
