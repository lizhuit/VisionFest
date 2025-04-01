<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - {{ $articulo->nombreArticulo }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
        .color-box {
            width: 30px;
            height: 30px;
            border: 1px solid #D17D98;
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
        }
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
                <a href="{{ route('galeriaDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacionDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
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
            <div class="flex-1 p-6 md:p-10">
                <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <!-- Imagen del artículo -->
                        <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-4">
                            <img src="{{ $articulo->rutaImagen }}" 
                                alt="{{ $articulo->nombreArticulo }}" 
                                class="w-full h-auto max-h-96 object-contain"
                                onerror="this.src='{{ asset('img/default-image.jpg') }}'">
                        </div>
                        
                        <!-- Información del artículo -->
                        <div class="p-6 md:w-1/2">
                            <h2 class="text-2xl font-bold text-[#6F2063] mb-2">{{ $articulo->nombreArticulo }}</h2>
                            
                            <!-- Precio -->
                            <div class="flex items-center mb-4">
                                <span class="text-xl font-semibold text-[#D17D98] mr-2">Precio:</span>
                                <span class="text-xl text-[#D17D98]">${{ number_format((float)$articulo->costoArticulo, 2) }}</span>
                            </div>
                            
                            <!-- Categoría -->
                            <div class="mb-4">
                                <span class="text-lg font-semibold text-gray-700 mr-2">Categoría:</span>
                                <span class="inline-block px-3 py-1 bg-[#FAD0C4] text-[#D17D98] rounded-full">
                                    {{ $articulo->categoria->nombreCategoria }}
                                </span>
                            </div>
                            
                            <!-- Detalles -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Descripción:</h3>
                                <p class="text-gray-700">{{ $articulo->detalles ?? 'No hay descripción disponible' }}</p>
                            </div>
                            
                            <!-- Color -->
                            @if($articulo->color)
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-700 mb-2">Color:</h3>
                                <div class="flex items-center">
                                    <div class="color-box" style="background-color: {{ $articulo->color->nombreColor }}"></div>
                                    <span class="text-gray-700">{{ $articulo->color->nombreColor }}</span>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Botones -->
                            <div class="mt-8 space-y-4">
                                <!-- Reemplaza el formulario actual con este -->
                                <form action="{{ route('agregar.cotizacionDal') }}" method="POST" class="mt-8">
                                    @csrf
                                    <input type="hidden" name="idArticulo" value="{{ $articulo->idArticulo }}">
                                    
                                    <div class="flex items-center mb-4">
                                        <label for="cantidad" class="mr-3 font-semibold">Cantidad:</label>
                                        <input type="number" name="cantidad" id="cantidad" 
                                            min="1" value="1" 
                                            class="w-20 px-2 py-1 border border-gray-300 rounded">
                                    </div>
                                    
                                    <button type="submit" 
                                            class="w-full px-6 py-3 bg-[#D17D98] text-white rounded-lg hover:bg-[#C599B6] transition flex items-center justify-center">
                                        <span class="mr-2">➕</span> Agregar a Cotización
                                    </button>
                                </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para depuración -->
    <script>
        // Mostrar información de depuración al mantener Ctrl+Shift
        document.addEventListener('keydown', function(e) {
            if(e.ctrlKey && e.shiftKey) {
                const debugInfo = `
                    <div class="fixed bottom-4 left-4 bg-white p-4 rounded-lg shadow-lg z-50 max-w-md">
                        <h3 class="font-bold text-lg mb-2">Información de Depuración</h3>
                        <p><strong>ID:</strong> {{ $articulo->idArticulo }}</p>
                        <p><strong>Archivo:</strong> {{ $articulo->foto }}</p>
                        <p><strong>Ruta:</strong> {{ $articulo->rutaImagen }}</p>
                        <p><strong>Categoría:</strong> {{ $articulo->categoria->nombreCategoria }}</p>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', debugInfo);
            }
        });
    </script>
</body>
</html>