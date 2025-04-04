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
        <!-- Menú lateral ajustado -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col shrink-0">
            <a href="{{ route('homeDal') }}" class="text-center text-[#D17D98] text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5 flex flex-col space-y-2">
                <a href="{{ route('galeriaDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg hover:bg-[#E3A8B6] transition-colors">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacionDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg hover:bg-[#E3A8B6] transition-colors">
                    <span>📄</span> Cotización
                </a>
                <a href="{{ route('correoDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg hover:bg-[#E3A8B6] transition-colors">
                    <span>📧</span> Contáctanos
                </a>
                <a href="{{ route('configuracion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg hover:bg-[#E3A8B6] transition-colors">
                    <span>⚙️</span> Configuración
                </a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-auto">
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4 sticky top-0 z-10">
                <h1 class="text-[#FFFFFF] text-3xl font-bold">VisionFest</h1>
                <img src="{{ asset('img/articulos/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16">
            </div>
            
            <div class="flex-1 p-10 bg-FFF7F3 relative">
                <!-- Bordes con globos -->
                <div class="absolute top-0 bottom-0 left-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/articulos/derecha.png') }}" alt="Globos Izquierda" class="w-full h-full object-cover">
                </div>
                <div class="absolute top-0 bottom-0 right-0 w-40 flex items-center z-0">
                    <img src="{{ asset('img/articulos/izquierda.png') }}" alt="Globos Derecha" class="w-full h-full object-cover">
                </div>
                
                <!-- Contenido principal -->
                <div class="relative z-10 h-full">
                    <!-- Texto introductorio -->
                    <div class="text-center max-w-3xl mx-auto">
                        <h2 class="text-3xl font-bold">"Tu visión, nuestra creación"</h2>
                        <div class="mt-5">
                            <h3 class="text-[#E6B2BA] text-xl font-bold">UN MUNDO DE COLOR</h3>
                            <p class="mt-3 text-gray-700">
                                Sabemos que los colores son una parte fundamental en la decoración, por eso, en Decoravisión nos aseguramos
                                de que todos puedan disfrutar de nuestras creaciones.
                            </p>
                            <div class="flex justify-center mt-5">
                                <button onclick="window.location.href='{{ route('galeriaDal') }}'" class="px-4 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#FAD0C4] transition-colors">
                                    Conócenos
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contenedor de ilustración y cuadros de información -->
                    <div class="flex flex-col lg:flex-row items-center justify-center mt-10 gap-8">
                        <!-- Cuadro de información izquierdo -->
                        <div class="bg-[#FAD0C4] p-6 rounded-lg shadow-md max-w-md w-full">
                            <h4 class="text-[#D17D98] font-bold text-xl mb-3">Navegación Accesible</h4>
                            <p class="text-gray-700">
                                Sabemos que el daltonismo puede afectar la experiencia de navegación. Hemos diseñado un modo especial para que tengas una experiencia inolvidable al elegir y entender cada diseño de decoración.
                            </p>
                        </div>
                        
                        <!-- Imagen del logo centrada -->
                        <div class="shrink-0">
                            <img src="{{ asset('img/articulos/logoDal.jpg') }}" alt="Logo VisionFestD" class="max-h-60">
                        </div>
                        
                        <!-- Cuadro de información derecho -->
                        <div class="bg-[#FAD0C4] p-6 rounded-lg shadow-md max-w-md w-full">
                            <h4 class="text-[#D17D98] font-bold text-xl mb-3">Cómo Funciona</h4>
                            <p class="text-gray-700">
                                Cada imagen estará etiquetada con un número identificador. Debajo de cada diseño encontrarás la simbología de colores con sus nombres especificados para que comprendas perfectamente cada combinación.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Simbología de colores debajo de la ilustración -->
                    <div class="mt-10 text-center max-w-2xl mx-auto">
                        <h4 class="text-[#D17D98] font-semibold mb-3">VisionFest</h4>
                        <p class="text-gray-700 mb-3">Los colores que están en la imagen, son:</p>
                        <div class="flex justify-center gap-6">
                            <!-- Color 1 -->
                            <div class="flex flex-col items-center gap-1">
                                <div class="w-14 h-14 rounded-full bg-blue-400 border-2 border-[#D17D98] flex items-center justify-center text-[#D17D98] font-bold">1</div>
                                <span class="text-gray-700">Azul</span>
                            </div>
                            <!-- Color 2 -->
                            <div class="flex flex-col items-center gap-1">
                                <div class="w-14 h-14 rounded-full bg-yellow-300 border-2 border-[#D17D98] flex items-center justify-center text-[#D17D98] font-bold">2</div>
                                <span class="text-gray-700">Amarillo</span>
                            </div>
                            <!-- Color 3 -->
                            <div class="flex flex-col items-center gap-1">
                                <div class="w-14 h-14 rounded-full bg-[#E3A8B6] border-2 border-[#D17D98] flex items-center justify-center text-[#D17D98] font-bold">3</div>
                                <span class="text-gray-700">Rosa</span>
                            </div>
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