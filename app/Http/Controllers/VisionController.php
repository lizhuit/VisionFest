<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisionController extends Controller
{
        public function index() {
            return view('home');
        }

        public function cotizacion() {
            return view('cotizacion');
        }

        public function galeria() {
            return view('galeria');
        }
        public function configuracion (){
            return view('configuracion');
        }
<<<<<<< HEAD
        public function correo(){
            return view('correo');
        }
=======
>>>>>>> 0c5ef93 (Modelos de BD)
}
