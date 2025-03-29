<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - {{ $articulo->nombreArticulo }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
    </style>
</head>
<body class="bg-FFF7F3 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <a href="{{ route('home') }}" class="text-center text-[#D17D98] text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeria') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📄</span> Cotización
                </a>
                <a href="{{ route('correo') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📧</span> Contáctanos
                </a>
                <a href="{{ route('configuracion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>⚙️</span> Configuración
                </a>
            </nav>
        </div>

        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Encabezado -->
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/articulos/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>

            <!-- Detalle del Artículo -->
            <div class="flex-1 p-10">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <!-- Imagen del artículo -->
                        <div class="md:w-1/2">
                            <img src="{{ $articulo->rutaImagen }}" 
                                alt="{{ $articulo->nombreArticulo }}" 
                                class="w-full h-full object-cover"
                                onerror="this.src='{{ asset('img/default-image.jpg') }}'">
                            <!-- Mensaje de depuración (opcional) -->
                            <div class="debug-info p-2 bg-gray-100 text-xs hidden">
                                <p>Ruta: {{ $articulo->rutaImagen }}</p>
                                <p>Archivo: {{ $articulo->foto }}</p>
                                <p>Categoría: {{ $articulo->categoria->nombreCategoria }}</p>
                            </div>
                        </div>
                        
                        <!-- Información del artículo -->
                        <div class="p-8 md:w-1/2">
                            <h2 class="text-2xl font-bold text-[#6F2063]">{{ $articulo->nombreArticulo }}</h2>
                            <p class="text-xl text-[#D17D98] mt-2">${{ number_format((float)$articulo->costoArticulo, 2) }}</p>
                            <!-- Categoría -->
                            <div class="mt-4">
                                <span class="inline-block px-3 py-1 bg-[#FAD0C4] text-[#D17D98] rounded-full text-sm">
                                    {{ $articulo->categoria->nombreCategoria }}
                                </span>
                            </div>
                            
                            <!-- Detalles -->
                            <div class="mt-6">
                                <h3 class="font-bold text-lg">Detalles:</h3>
                                <p class="mt-2 text-gray-700">{{ $articulo->detalles }}</p>
                            </div>
                            
                            <!-- Color -->
                            @if($articulo->color)
                            <div class="mt-6">
                                <h3 class="font-bold text-lg">Color:</h3>
                                <div class="flex items-center mt-2">
                                    <span class="w-6 h-6 rounded-full mr-2 border border-gray-300" 
                                          style="background-color: {{ $articulo->color->nombreColor }}"></span>
                                    <span>{{ $articulo->color->nombreColor }}</span>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Botones -->
                            <div class="mt-8 space-y-4">
                                <form action="{{ route('agregar.cotizacion') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idArticulo" value="{{ $articulo->idArticulo }}">
                                    <button type="submit" 
                                            class="w-full px-6 py-2 bg-[#D17D98] text-white rounded-lg hover:bg-[#C599B6] transition">
                                        Agregar a Cotización
                                    </button>
                                </form>
                                
                                <a href="{{ url()->previous() }}" 
                                   class="inline-block w-full text-center px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                                    Regresar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar información de depuración al mantener Ctrl (opcional)
        document.addEventListener('keydown', function(e) {
            if(e.ctrlKey) {
                document.querySelectorAll('.debug-info').forEach(el => {
                    el.classList.remove('hidden');
                });
            }
        });
        document.addEventListener('keyup', function(e) {
            if(!e.ctrlKey) {
                document.querySelectorAll('.debug-info').forEach(el => {
                    el.classList.add('hidden');
                });
            }
        });
    </script>
</body>
</html>