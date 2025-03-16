<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Cotización</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="flex-1 p-10 bg-white">
            <h2 class="text-pink-500 text-3xl font-bold text-left">Cotización</h2>
            <table class="w-full border mt-5 text-center">
                <thead class="bg-pink-300 text-white">
                    <tr>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Precio</th>
                        <th class="p-2">Cantidad</th>
                        <th class="p-2">Total</th>
                        <th class="p-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td class="p-2">Arco pequeño</td>
                        <td class="p-2">$200.00</td>
                        <td class="p-2">1</td>
                        <td class="p-2">$300.00</td>
                        <td class="p-2"><button class="bg-pink-500 text-white px-2 py-1 rounded">Eliminar</button></td>
                    </tr>
                    <tr class="border">
                        <td class="p-2">Semi arco</td>
                        <td class="p-2">$250.00</td>
                        <td class="p-2">1</td>
                        <td class="p-2">$250.00</td>
                        <td class="p-2"><button class="bg-pink-500 text-white px-2 py-1 rounded">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right mt-5 text-xl">Monto: <span class="font-bold">$550.00</span></div>
        </div>
    </div>
</body>
</html>