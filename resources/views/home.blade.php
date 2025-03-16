<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #fff; }
    </style>
</head>
<body class="bg-white font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-pink-300 p-5 flex flex-col">
            <h1 class="text-white text-3xl font-bold text-center">VisionFest</h1>
            <!-- Icono de Home arriba -->
            <a href="{{ route('home') }}" class="text-center text-white text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('home') }}" class="flex items-center gap-2 p-3 text-white bg-pink-500 rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacion') }}" class="flex items-center gap-2 p-3 text-white bg-pink-500 rounded-lg mt-2">
                    <span>📄</span> Cotización
                </a>
                <a href="#" class="flex items-center gap-2 p-3 text-white bg-pink-500 rounded-lg mt-2">
                    <span>⚙️</span> Configuración
                </a>
            </nav>
        </div>
        <!-- Content -->
        <div class="flex-1 p-10 bg-white relative">
            <h2 class="text-pink-500 text-3xl font-bold text-center">"Tu visión, nuestra creación"</h2>
            <div class="text-center mt-5">
                <h3 class="text-pink-500 text-xl font-bold">UN MUNDO DE COLOR</h3>
                <p class="mt-3 text-gray-700 max-w-2xl mx-auto">
                    Sabemos que los colores son una parte fundamental en la decoración, por eso, en Decoravisión nos aseguramos
                    de que todos puedan disfrutar de nuestras creaciones.
                </p>
                <p class="mt-3 text-gray-700 max-w-2xl mx-auto">
                    Nuestra marca realiza decoraciones de globos para cualquier tipo de evento. Estamos preparados para realizar lo que tengas en mente para sorprender a tus invitados.
                </p>
                <button class="mt-5 px-6 py-2 bg-pink-500 text-white rounded-lg shadow-md hover:bg-pink-600">
                    Conócenos
                </button>
            </div>
            <!-- Logo -->
            <div class="absolute top-1/3 right-10">
                <img src="/img/visionfest-logo.png" class="w-40" alt="Logo VisionFest">
            </div>
            <!-- Bordes con globos -->
            <div class="absolute inset-0 flex justify-between">
                <img src="/img/balloons-left.png" class="h-full" alt="Balloons Left">
                <img src="/img/balloons-right.png" class="h-full" alt="Balloons Right">
            </div>
        </div>
    </div>
</body>
</html>