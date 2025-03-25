<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Correo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Función para mostrar mensaje de éxito
        function enviarCorreo() {
            alert("El correo ha sido enviado con éxito.");
        }
    </script>
</head>
<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
       
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            
        
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
            <h2 class="text-2xl font-bold text-[#6F2063]">Contáctanos</h2>
            <br><br><br>

            <center>
                <div class="contact-form">
                    <h3 class="text-2xl font-bold">Escribe tu mensaje:</h3>
                    <br><br>
                    <!-- escribir el mensaje -->
                    <div class="w-96 h-32 border-b-2 border-gray-300 mb-4">
                        <input type="text" class="w-full h-full bg-transparent border-none outline-none" placeholder="Escribe aquí tu mensaje...">
                    </div>
                    <br><br><br>
                    <button class="px-2 py-2 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]" onclick="enviarCorreo()">Enviar</button>
                </div>
            </center>
        </div>
    </div>
</body>
</html>
