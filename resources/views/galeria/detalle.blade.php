<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionFest - {{ $articulo->nombreArticulo }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #FFF7F3; }
    </style>
</head>
<body class="bg-FFF7F3 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar (igual al anterior) -->
        <div class="w-64 bg-[#FAD0C4] p-5 flex flex-col">
            <!-- ... (código existente del sidebar) ... -->
        </div>
        
        <!-- Contenido Principal -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Encabezado -->
            <div class="bg-[#E3A8B6] flex justify-between items-center p-4">
                <h1 class="text-[#FFFFFF] text-3xl font-bold text-center">VisionFest</h1>
                <img src="{{ asset('img/logo.jpg') }}" alt="VisionFest Logo" class="w-16 h-16 ml-auto">
            </div>
            
            <!-- Detalle del Artículo -->
            <div class="flex-1 p-10">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <img src="{{ asset('img/'.$articulo->foto) }}" 
                                 alt="{{ $articulo->nombreArticulo }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-8 md:w-1/2">
                            <h2 class="text-2xl font-bold text-[#6F2063]">{{ $articulo->nombreArticulo }}</h2>
                            <p class="text-xl text-[#D17D98] mt-2">${{ number_format($articulo->costoArticulo, 2) }}</p>
                            
                            <div class="mt-6">
                                <h3 class="font-bold text-lg">Detalles:</h3>
                                <p class="mt-2 text-gray-700">{{ $articulo->detalles }}</p>
                            </div>
                            
                            @if($articulo->color)
                            <div class="mt-6">
                                <h3 class="font-bold text-lg">Color:</h3>
                                <div class="flex items-center mt-2">
                                    <span class="w-6 h-6 rounded-full mr-2" 
                                          style="background-color: #{{ $articulo->color->codigo }}"></span>
                                    <span>{{ $articulo->color->nombreColor }}</span>
                                </div>
                            </div>
                            @endif
                            
                            <form action="{{ route('agregar.cotizacion') }}" method="POST" class="mt-8">
                                @csrf
                                <input type="hidden" name="idArticulo" value="{{ $articulo->idArticulo }}">
                                <button type="submit" 
                                        class="px-6 py-2 bg-[#D17D98] text-white rounded-lg hover:bg-[#C599B6] transition">
                                    Agregar a Cotización
                                </button>
                            </form>
                            
                            <a href="{{ url()->previous() }}" 
                               class="inline-block mt-4 px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition">
                                Regresar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>