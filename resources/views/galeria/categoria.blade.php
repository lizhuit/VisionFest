@extends('galeria')

@section('content')
    <div class="flex-1 p-10 overflow-y-auto">
        <!-- Filtros por categoría -->
        <div class="flex justify-center gap-4 mb-8">
            @foreach($categorias as $cat)
            <a href="{{ route('galeria.categoria', ['categoria' => $cat]) }}" 
               class="category-btn px-4 py-2 {{ $cat == $categoria ? 'bg-[#D17D98] text-white' : 'bg-[#FAD0C4] text-[#D17D98]' }} rounded-lg">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        
        <h3 class="text-xl font-semibold text-[#6F2063] mb-6">Categoría: {{ $categoria }}</h3>
        
        <!-- Grid de Imágenes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($articulos as $articulo)
            <div class="grid-item relative rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                <a href="{{ route('articulo.detalle', ['id' => $articulo->idArticulo]) }}">
                    <img src="{{ asset('img/'.$articulo->foto) }}" 
                         alt="{{ $articulo->nombreArticulo }}" 
                         class="w-full h-64 object-cover">
                    <div class="overlay absolute inset-0 bg-[#D17D98] bg-opacity-70 flex items-center justify-center opacity-0 transition-opacity">
                        <div class="text-center text-white p-4">
                            <h3 class="font-bold text-xl">{{ $articulo->nombreArticulo }}</h3>
                            <p class="mt-2">${{ number_format($articulo->costoArticulo, 2) }}</p>
                            <button class="mt-3 px-4 py-1 bg-white text-[#D17D98] rounded-lg">Ver Detalles</button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection