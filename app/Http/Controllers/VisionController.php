<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        public function configuracion (){
            return view('configuracion');
        }

        public function correo(){
            return view('correo');
        }
<<<<<<< HEAD
=======
       /* public function enviarcorreo(Request $request)
        {
            // Validar los datos de la solicitud
            $request->validate([
                'nombre' => 'required|string',
                'email' => 'required|email',
                'mensaje' => 'required|string',
            ]);
    
            $nombre = $request->input('nombre');
            $email = $request->input('email');
            $mensaje = $request->input('mensaje');
    
            // Configurar PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configurar servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'huitzillizbeth4@gmail.com';  // Tu correo SMTP
                $mail->Password = 'qicqtptqqzmqcooo';  // Tu contraseña SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
    
                // Configuración del correo
                $mail->setFrom('huitzillizbeth4@gmail.com', 'VisionFest Contacto');
                $mail->addReplyTo($email, $nombre);
                $mail->addAddress('huitzillizbeth4@gmail.com'); // Correo destino
                $mail->Subject = "Consulta de $nombre";
                $mail->Body = "Nombre: $nombre\nCorreo: $email\nMensaje: $mensaje";
    
                // Enviar el correo
                $mail->send();
    
                return response()->json(['status' => 'success', 'message' => 'Correo enviado correctamente']);
            } catch (Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'Error al enviar correo: ' . $mail->ErrorInfo]);
            }
        }*/
        // VisionController.php
>>>>>>> b2e81ab5209c73814e9b4a7a0db2e637805ea48a
        public function homeDal() {
            return view('homeDaltoni');
        }

//-------------------------------------------------------------------galeria NORMAL
        public function galeria()
        {
            $categorias = categorias::all(); 
            $articulos = articulos::with(['color', 'categoria'])->get();

            foreach ($articulos as $articulo) {
                // Usar foto normal para galería estándar
                $subcarpeta = strtolower(str_replace([' ', 'ñ', 'áéíóú'], ['-', 'n', 'aeiou'], $articulo->categoria->nombreCategoria));
                $nombreArchivo = $articulo->foto; // Usando la columna foto normal
                
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
                }
            }

            return view('galeria.galeria', compact('articulos', 'categorias'));
        }
            
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
        
        public function detalleArticulo($id)
        {
            $articulo = articulos::with(['color', 'categoria'])->findOrFail($id);

            $categoriaBase = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
            $subcarpeta = $categoriaBase;

            $nombreArchivo = $articulo->foto;

            $extensiones = ['.png', '.jpg', '.jpeg', '.webp'];
            foreach ($extensiones as $ext) {
                $ruta = "articulos/{$subcarpeta}/{$nombreArchivo}{$ext}";
                if (Storage::disk('public')->exists($ruta)) {
                    $articulo->rutaImagen = Storage::url($ruta);
                    break;
                }
            }
            return view('galeria.detalle', compact('articulo'));

        }
        

//---------------------------------------------------------------Galeria DALTONICO

            public function galeriaDal()
            {
                $categorias = categorias::all(); 
                $articulos = articulos::with(['color', 'categoria'])->get();

                foreach ($articulos as $articulo) {
                    // Usar fotoD para galeríaDaltoni
                    $subcarpeta = strtolower(str_replace([' ', 'ñ', 'áéíóú'], ['-', 'n', 'aeiou'], $articulo->categoria->nombreCategoria));
                    $nombreArchivo = $articulo->fotoD; // Cambiado a fotoD para Daltoni
                    
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
                    }
                }

                return view('galeria.galeriaDaltoni', compact('articulos', 'categorias'));
            }
/*
            public function galeriaCategoriaDal($categoria)
        {
            $categorias = categorias::all();
            $articulos = articulos::whereHas('categoria', function($query) use ($categoria) {
                $query->where('nombreCategoria', $categoria);
            })->with(['color', 'categoria'])->get();

            // Generar la ruta de imagen pública
            foreach ($articulos as $articulo) {
                $subcarpeta = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
                $rutaImagen = 'articulos/' . $subcarpeta . '/' . $articulo->fotoD;

                // Validar si el archivo existe
                if (Storage::exists($rutaImagen)) {
                    $articulo->rutaImagen = Storage::url($rutaImagen);
                } else {
                    $articulo->rutaImagen = asset('img/imagen-no-encontrada.png'); // Imagen por defecto
                }
            }

            return view('galeria.categoriaDal', [
                'articulos' => $articulos,
                'categoria' => $categoria,
                'categorias' => $categorias
            ]);
        }
*/
            public function galeriaCategoriaDal($categoria)
            {
                $categorias = categorias::all();
                $articulos = articulos::whereHas('categoria', function($query) use ($categoria) {
                    $query->where('nombreCategoria', $categoria);
                })->with(['color', 'categoria'])->get();

                foreach ($articulos as $articulo) {
                    $subcarpeta = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
                    $nombreArchivo = $articulo->fotoD; // Usamos la versión daltónica
                    
                    // Buscar imagen con extensión correcta
                    $extensiones = ['.png', '.jpg', '.jpeg', '.webp'];
                    foreach ($extensiones as $ext) {
                        $ruta = "articulos/{$subcarpeta}/{$nombreArchivo}{$ext}";
                        if (Storage::disk('public')->exists($ruta)) {
                            $articulo->rutaImagen = Storage::url($ruta);
                            break;
                        }
                    }
                    
                    if (!isset($articulo->rutaImagen)) {
                        $articulo->rutaImagen = asset('img/default-image-daltoni.jpg');
                    }
                }

                return view('galeria.categoriaDal', compact('articulos', 'categoria', 'categorias'));
            }


        public function detalleArticuloDal($id)
        {
            $articulo = articulos::with(['color', 'categoria'])->findOrFail($id);

            // 1. Carpeta daltónica (agrega 'D' al nombre de categoría)
            $categoriaBase = strtolower(str_replace(' ', '-', $articulo->categoria->nombreCategoria));
            $subcarpeta = $categoriaBase . 'D'; // ej: "bodasD"

            // 2. Usar fotoD para la versión daltónica
            $nombreArchivo = $articulo->fotoD;

            // 3. Buscar imagen con extensión correcta
            $extensiones = ['.png', '.jpg', '.jpeg', '.webp'];
            foreach ($extensiones as $ext) {
                $ruta = "articulos/{$subcarpeta}/{$nombreArchivo}{$ext}";
                if (Storage::disk('public')->exists($ruta)) {
                    $articulo->rutaImagen = Storage::url($ruta);
                    break;
                }
            }

            // 4. Si no se encuentra la imagen daltónica, usar la normal como fallback
            if (!isset($articulo->rutaImagen)) {
                $subcarpetaNormal = $categoriaBase;
                foreach ($extensiones as $ext) {
                    $ruta = "articulos/{$subcarpetaNormal}/{$nombreArchivo}{$ext}";
                    if (Storage::disk('public')->exists($ruta)) {
                        $articulo->rutaImagen = Storage::url($ruta);
                        break;
                    }
                }
            }

            // 5. Finalmente, si no hay ninguna imagen
            if (!isset($articulo->rutaImagen)) {
                $articulo->rutaImagen = asset('img/default-image-daltoni.jpg');
            }

            return view('galeria.detalleDal', compact('articulo'));
        }


        



//----------------------------------------------------------------------------------cotizacion normal
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
        

//--------------------------------------------------------------------------cotizacion daltonicos
public function cotizacionDal(Request $request)
        {
            // Obtener la cotización actual de la sesión
            $cotizacion = $request->session()->get('cotizacionDal', []);
            
            // Calcular total
            $total = 0;
            foreach ($cotizacion as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            
            return view('cotizacionDal', [
                'productosCotizacion' => $cotizacion,
                'total' => $total
            ]);
        }
/*
        public function agregarCotizacionDal(Request $request)
        {
            $request->validate([
                'idArticulo' => 'required|exists:articulos,idArticulo',
                'cantidad' => 'required|integer|min:1'
            ]);
            
            // Obtener el artículo
            $articulo = articulos::findOrFail($request->idArticulo);
            
            // Obtener cotización actual de la sesión
            $cotizacion = $request->session()->get('cotizacionDal', []);
            
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
            $request->session()->put('cotizacionDal', $cotizacion);
            
            return redirect()->route('cotizacionDal')
                ->with('success', 'Artículo agregado a la cotización');
        }
                */
                public function agregarCotizacionDal(Request $request)
                {
                    $request->validate([
                        'idArticulo' => 'required|exists:articulos,idArticulo',
                        'cantidad' => 'required|integer|min:1'
                    ]);
                    
                    $articulo = articulos::findOrFail($request->idArticulo);
                    
                    // Obtener cotización actual de la sesión
                    $cotizacion = $request->session()->get('cotizacionDal', []);
                    
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
                            'cantidad' => $request->cantidad,
                            'imagen' => $articulo->ruta_imagen_daltoni // Asegúrate de tener este accesor
                        ];
                    }
                    
                    // Guardar en sesión con clave específica para daltónico
                    $request->session()->put('cotizacionDal', $cotizacion);
                    
                    return redirect()->route('cotizacionDal')
                        ->with('success', 'Artículo agregado a la cotización daltónica');
                }

        public function eliminarCotizacionDal(Request $request, $index)
        {
            $cotizacion = $request->session()->get('cotizacionDal', []);
            
            if (isset($cotizacion[$index])) {
                unset($cotizacion[$index]);
                $cotizacion = array_values($cotizacion); // Reindexar array
                $request->session()->put('cotizacionDal', $cotizacion);
            }
            
            return redirect()->route('cotizacionDal')
                ->with('success', 'Artículo eliminado de la cotización');
        }

        public function cancelarCotizacionDal(Request $request)
        {
            $request->session()->forget('cotizacionDal');
            
            return redirect()->route('cotizacionDal')
                ->with('success', 'Cotización cancelada');
        }
}
