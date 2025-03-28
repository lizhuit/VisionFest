<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Galería</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
        .grid-item:hover .overlay { opacity: 1; }
        .category-btn.active {
            background-color: #D17D98;
            color: white;
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
        <div class="flex-1 flex flex-col">
            <!-- Encabezado -->
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/articulos/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>
            
            <h2 class="text-2xl font-bold text-[#6F2063] p-4">Galería</h2>

            <!-- Contenido Principal de la Galería -->
            <div class="flex-1 p-10 overflow-y-auto">
                <!-- Filtros por categoría -->
                <div class="flex justify-center gap-4 mb-8">
                    @foreach($categorias as $cat)
                    <a href="{{ route('galeria.categoria', ['categoria' => $cat->nombreCategoria]) }}" 
                    class="category-btn px-4 py-2 {{ $cat->nombreCategoria == ($categoria ?? '') ? 'bg-[#D17D98] text-white' : 'bg-[#FAD0C4] text-[#D17D98]' }} rounded-lg">
                        {{ $cat->nombreCategoria }}
                    </a>
                    @endforeach
                </div>

                <!-- Grid de Imágenes -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articulos as $articulo)
                    <div class="grid-item relative rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <a href="{{ route('articulo.detalle', ['id' => $articulo->idArticulo]) }}">
                            <img src="{{ asset('img/articulos/' . $articulo->categoria->nombreCategoria . '/' . $articulo->foto) }}" 
                                alt="{{ $articulo->nombreArticulo }}" 
                                class="w-full h-64 object-cover">
                                <div class="overlay absolute inset-0 bg-[#D17D98] bg-opacity-70 flex items-center justify-center opacity-0 transition-opacity">
                                <div class="text-center text-white p-4">
                                    <h3 class="font-bold text-xl">{{ $articulo->nombreArticulo }}</h3>
                                    <p class="text-[#D17D98]">${{ number_format((float)$articulo->costoArticulo, 2) }}</p>
                                    <span class="mt-3 inline-block px-4 py-1 bg-white text-[#D17D98] rounded-lg">Ver Detalles</span>
                                </div>
                            </div>
                        </a>
                        <div class="p-4">
                            <h3 class="font-semibold">{{ $articulo->nombreArticulo }}</h3>
                            <p class="text-[#D17D98]">${{ number_format($articulo->costoArticulo, 2) }}</p>
                            <p class="text-sm text-gray-600">{{ $articulo->categoria->nombreCategoria }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                
               
            </div>
        </div>
    </div>

    <script>
        // Resaltar categoría activa
        document.addEventListener('DOMContentLoaded', function() {
            const currentCategory = "{{ request()->segment(2) }}";
            if(currentCategory) {
                const buttons = document.querySelectorAll('.category-btn');
                buttons.forEach(btn => {
                    if(btn.textContent.trim() === currentCategory) {
                        btn.classList.add('active');
                    }
                });
            }
        });
    </script>
</body>
</html>