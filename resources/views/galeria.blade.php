<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest -  Galería</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
        .grid-item:hover .overlay { opacity: 1; }
    </style>
</head>
<body class="bg-FFF7F3 font-sans">
    <div class="flex h-screen">
      
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

            <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
        </div>
        <h2 class="text-2xl font-bold text-[#6F2063]">Galería</h2>
        <!-- Contenido Principal de la Galería -->
        <div class="flex-1 p-10 overflow-y-auto">
         <!-- Título y Filtros -->
            <div class="mb-8 text-center">
                <p class="text-gray-600 mt-2">Explora nuestras decoraciones personalizadas</p>
                
                <!-- Filtros por categoría -->
                <div class="flex justify-center gap-4 mt-5">
                    <button class="px-4 py-2 bg-[#FAD0C4] text-[#D17D98] rounded-lg">Bodas</button>
                    <button class="px-4 py-2 bg-[#FAD0C4] text-[#D17D98] rounded-lg">XV Años</button>
                    <button class="px-4 py-2 bg-[#FAD0C4] text-[#D17D98] rounded-lg">Cumpleaños</button>
                </div>
            </div>

            <!-- Grid de Imágenes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="grid-item relative rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                        <img src="{{ asset('img/img54.png') }}" alt="Evento {{ $i }}" class="w-full h-64 object-cover">
                        <div class="overlay absolute inset-0 bg-[#D17D98] bg-opacity-70 flex items-center justify-center opacity-0 transition-opacity">
                            <div class="text-center text-white p-4">
                                <h3 class="font-bold text-xl">Evento {{ $i }}</h3>
                                <p class="mt-2">Decoración con globos y flores</p>
                                <button class="mt-3 px-4 py-1 bg-white text-[#D17D98] rounded-lg">Ver Detalles</button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

       
            <div class="text-center mt-10">
                <button class="px-6 py-2 bg-[#D17D98] text-white rounded-lg hover:bg-[#C599B6]">
                    Cargar Más Eventos
                </button>
            </div>
        </div>
    </div>
</body>
</html>
