<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFFFFF; }
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
        

        <div class="flex-1 flex flex-col">
            <!-- Encabezado -->
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/articulos/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>
            <!-- Contenido principal -->
            <div class="flex-1 p-10 bg-FFF7F3 relative">
                <!-- Bordes con globos -->
                <div class="absolute top-0 bottom-0 left-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/articulos/derecha.png') }}" alt="Globos Izquierda" class="w-full h-full object-cover">
                </div>
                <div class="absolute top-0 bottom-0 right-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/articulos/izquierda.png') }}" alt="Globos Derecha" class="w-full h-full object-cover">
                </div>
        
                <!-- Contenido principal -->
                <div class="relative z-10 text-center">
                    <h2 class="text-3xl font-bold">"Tu visión, nuestra creación"</h2>
                    <div class="mt-5">
                        <h3 class="text-[#E6B2BA] text-xl font-bold">UN MUNDO DE COLOR</h3>
                        <p class="mt-3 text-gray-700 max-w-2xl mx-auto">
                            Sabemos que los colores son una parte fundamental en la decoración, por eso, en Decoravisión nos aseguramos
                            de que todos puedan disfrutar de nuestras creaciones.
                        </p>
                        <p class="mt-3 text-gray-700 max-w-2xl mx-auto">
                            Nuestra marca realiza decoraciones de globos para cualquier tipo de evento. Estamos preparados para realizar lo que tengas en mente para sorprender a tus invitados.
                        </p>
                        
                        <!-- Imagen debajo del texto -->
                        <div class="mt-8 flex justify-center">
                            <img src="{{ asset('img/articulos/logo.jpg') }}" alt="Logo VisionFest" class="max-w-xs rounded-lg shadow-lg">
                        </div>
                        
                        <div class="flex justify-center mt-5">
                            <button onclick="window.location.href='{{ route('galeria') }}'" class="px-2 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">
                                Conócenos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para configuración del modo daltónico -->
    <div class="fixed bottom-4 right-4">
        <button onclick="window.location.href='{{ route('configuracion') }}'" class="flex items-center gap-2 px-4 py-2 bg-[#B76A87] text-white rounded-full shadow-lg hover:bg-[#9B5A73]">
            <span>👁️‍🗨️</span> Modo Daltónico
        </button>
    </div>
</body>
</html>
