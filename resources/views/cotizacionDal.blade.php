<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - Cotización</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Manejar eliminación con confirmación
    document.querySelectorAll('form[action*="eliminar-cotizacion"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('¿Estás seguro de eliminar este artículo de la cotización?')) {
                e.preventDefault();
            }
        });
    });
    
    // Manejar cancelación con confirmación
    document.querySelector('form[action*="cancelar-cotizacion"]')?.addEventListener('submit', function(e) {
        if (!confirm('¿Estás seguro de cancelar toda la cotización?')) {
            e.preventDefault();
        }
    });
});
</script>


<body class="bg-[#FFFFFF] font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <a href="{{ route('home') }}" class="text-center text-white text-3xl mb-4">
                <span class="text-4xl">🏠</span>
            </a>
            <nav class="mt-5">
                <a href="{{ route('galeriaDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
                    <span>🖼️</span> Galería
                </a>
                <a href="{{ route('cotizacionDal') }}" class="flex items-center gap-2 p-3 text-white bg-[#D17D98] rounded-lg mt-2">
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
            
            <div class="flex-1 p-10 bg-[#FFFFFF]">
                <h2 class="text-2xl font-bold text-[#6F2063] mb-6">Cotización</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(count($productosCotizacion) > 0)
                    <!-- Tabla de Cotización -->
                    <div class="overflow-x-auto">
                        <table class="w-full border mt-5 text-center">
                            <thead class="bg-[#FAD0C4] text-white">
                                <tr>
                                    <th class="p-2">Nombre</th>
                                    <th class="p-2">Precio Unitario</th>
                                    <th class="p-2">Cantidad</th>
                                    <th class="p-2">Total</th>
                                    <th class="p-2">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productosCotizacion as $index => $producto)
                                <tr class="border">
                                    <td class="p-2">{{ $producto['nombre'] }}</td>
                                    <td class="p-2">${{ number_format($producto['precio'], 2) }}</td>
                                    <td class="p-2">{{ $producto['cantidad'] }}</td>
                                    <td class="p-2">${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}</td>
                                    <td class="p-2">
                                        <form action="{{ route('eliminar.cotizacionDal', $index) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 bg-[#FFF7F3] border-2 border-[#C599B6] hover:bg-[#B76A87]">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Monto total -->
                    <div class="text-right mt-5 text-xl">
                        <span class="font-semibold">Total:</span> 
                        <span class="font-bold" id="montoTotal">${{ number_format($total, 2) }}</span>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-between mt-8">
                        <form action="{{ route('cancelar.cotizacionDal') }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Cancelar Cotización
                            </button>
                        </form>
                        
                        <a href="{{ route('galeriaDal') }}" class="px-4 py-2 bg-[#D17D98] text-white rounded hover:bg-[#C599B6]">
                            Ir a la Galeria
                        </a>
                    </div>
                @else
                    <div class="text-center py-10">
                        <p class="text-lg text-gray-600">No hay artículos en la cotización</p>
                        <a href="{{ route('galeriaDal') }}" class="mt-4 inline-block px-4 py-2 bg-[#D17D98] text-white rounded hover:bg-[#C599B6]">
                            Ir a la Galería
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>