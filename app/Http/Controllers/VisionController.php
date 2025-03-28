<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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

        public function galeria() {
            return view('galeria');
        }
        public function galeriaDal(){
            return view('galeriaDaltoni');
        }
        public function configuracion (){
            return view('configuracion');
        }

        public function correo(){
            return view('correo');
        }
        
}
