<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
    </style>
</head>
<body class="bg-FFF7F3 font-sans">
    <div class="flex h-screen">
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <a href="{{ route('home') }}" class="text-center text-[#D17D98] text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeriaDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
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
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold">VisionFest</h1>
                <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16">
            </div>
            <div class="flex-1 p-10 bg-FFF7F3 relative">
                <!-- Bordes con globos -->
                <div class="absolute top-0 bottom-0 left-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/derecha.png') }}" alt="Globos Izquierda" class="w-full h-full object-cover">
                </div>
                <div class="absolute top-0 bottom-0 right-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/izquierda.png') }}" alt="Globos Derecha" class="w-full h-full object-cover">
                </div>
                
                <!-- Contenido principal centrado -->
                <div class="relative z-10 h-full flex flex-col items-center justify-center">
                    <!-- Texto -->
                    <div class="text-center max-w-2xl">
                        <h2 class="text-3xl font-bold">"Tu visión, nuestra creación"</h2>
                        <div class="mt-5">
                            <h3 class="text-[#E6B2BA] text-xl font-bold">UN MUNDO DE COLOR</h3>
                            <p class="mt-3 text-gray-700">
                                Sabemos que los colores son una parte fundamental en la decoración, por eso, en Decoravisión nos aseguramos
                                de que todos puedan disfrutar de nuestras creaciones.
                            </p>
                            <p class="mt-3 text-gray-700">
                                Nuestra marca realiza decoraciones de globos para cualquier tipo de evento. Estamos preparados para realizar lo que tengas en mente para sorprender a tus invitados.
                            </p>
                            <div class="flex justify-center mt-5">
                                <button onclick="window.location.href='{{ route('galeria') }}'" class="px-4 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#FAD0C4] transition-colors">
                                    Conócenos
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Imagen del logo centrada -->
                    <div class="mt-10 mb-6">
                        <img src="{{ asset('img/articulos/logoDal.jpg') }}" alt="Logo VisionFest" class="mx-auto max-h-60">
                    </div>
                    
                    <!-- Simbología de colores con etiquetas -->
                    <div class="mt-4 text-center">
                        <h4 class="text-[#D17D98] font-semibold mb-3">VisionFest</h4>
                        <p class="text-gray-700 mb-3">Los colores que están en la imagen, son:</p>
                        <div class="flex flex-col items-center gap-2">
                            <!-- Color 1 -->
                            <div class="flex items-center gap-2">
                                <span>1.</span>
                                <div class="w-10 h-10 rounded-full bg-blue-400 border-2 border-[#D17D98]"></div>
                                <span class="text-gray-700">Azul</span>
                            </div>
                            <!-- Color 2 -->
                            <div class="flex items-center gap-2">
                                <span>2.</span>
                                <div class="w-10 h-10 rounded-full bg-yellow-300 border-2 border-[#D17D98]"></div>
                                <span class="text-gray-700">Amarillo</span>
                            </div>
                            <!-- Color 3 -->
                            <div class="flex items-center gap-2">
                                <span>3.</span>
                                <div class="w-10 h-10 rounded-full bg-[#E3A8B6] border-2 border-[#D17D98]"></div>
                                <span class="text-gray-700">Rosa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>