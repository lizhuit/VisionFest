<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Configuración</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <!-- Icono de Home arriba -->
            <a href="{{ route('home') }}" class="text-center text-white text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeria') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacion') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>📄</span> Cotización
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
        <h2 class="text-2xl font-bold text-[#6F2063]">Configuración</h2>

        <!-- Modal para preguntar qué acción quiere hacer -->
        <div id="accionModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
            <div class="bg-[#B76A87] p-6 rounded-lg shadow-xl max-w-md w-full text-center">
                <p class=" text-xl font-bold mb-4">¿Qué acción desea realizar?</p>
                <div class="flex justify-center gap-4">
                    <button onclick="responderAccion(true)" class="px-4 py-4 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">
                        Activar modo daltónico
                    </button>
                    <button onclick="responderAccion(false)" class="px-4 py-4 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">
                        Enviar correo
                    </button>
                </div>
            </div>
        </div>


        <script>
            // Mostrar el modal automáticamente al cargar la página
            window.onload = function() {
                document.getElementById('accionModal').classList.remove('hidden');
            };

            // Función para manejar la respuesta del usuario
            function responderAccion(esDaltonico) {
                document.getElementById('accionModal').classList.add('hidden');
                if (esDaltonico) {
                    alert("Hemos ajustado la interfaz para mejorar tu experiencia.");
                } else {
                    window.location.href = "{{ route('correo') }}"; // Cambia esto por la URL correcta
                }
            }
        </script>


            <!-- Logo de VisionFest -->
            <div class="text-center">
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg inline-block">
                    <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-32 mx-auto">
                </div>
            </div>
        </div>
    </div>

</body>
</html>
