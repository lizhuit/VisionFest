<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Cotización</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <h1 class="text-[#D17D98] text-3xl font-bold text-center">VisionFest</h1>
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
            <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
        </div>
        <h2 class="text-2xl font-bold text-[#6F2063]">Cotización</h2>
        <!-- Content -->
        <div class="flex-1 p-10 bg-[#FFFFFF]">
            <table class="w-full border mt-5 text-center">
                <thead class="bg-[#FAD0C4] text-white">
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
                        <td class="p-2"><button class="bg-[#C599B6] text-white px-2 py-1 rounded">Eliminar</button></td>
                    </tr>
                    <tr class="border">
                        <td class="p-2">Semi arco</td>
                        <td class="p-2">$250.00</td>
                        <td class="p-2">1</td>
                        <td class="p-2">$250.00</td>
                        <td class="p-2"><button class="bg-[#C599B6] text-white px-2 py-1 rounded">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right mt-5 text-xl">Monto: <span class="font-bold">$550.00</span></div>
        </div>
    </div>
</body>
</html>
