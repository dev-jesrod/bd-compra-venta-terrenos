    @extends('layouts.app')

@section('title', 'Maz Terrenos - Catálogo')

@php
    $css_file = 'homePage';
@endphp

@section('content')
<main class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 md:px-20 py-8">
            <h1 class="text-4xl font-black text-gray-900 mb-2">Catálogo de Terrenos</h1>
            <p class="text-gray-500 font-medium text-sm">Encuentra el terreno perfecto para tu próximo proyecto.</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 py-6">
        <form method="GET" action="{{ route('terrenos.index') }}" class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <!-- Búsqueda -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Buscar</label>
                    <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Nombre, ubicación..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Ubicación -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ request('ubicacion') }}" placeholder="Ciudad, estado..."
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Estado -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Estado</label>
                    <select name="estado"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">Todos</option>
                        <option value="DISPONIBLE" {{ request('estado') == 'DISPONIBLE' ? 'selected' : '' }}>Disponible</option>
                        <option value="RESERVADO" {{ request('estado') == 'RESERVADO' ? 'selected' : '' }}>Reservado</option>
                        <option value="VENDIDO" {{ request('estado') == 'VENDIDO' ? 'selected' : '' }}>Vendido</option>
                    </select>
                </div>

                <!-- Zonificación -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Zonificación</label>
                    <select name="zonificacion"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">Todas</option>
                        <option value="RESIDENCIAL" {{ request('zonificacion') == 'RESIDENCIAL' ? 'selected' : '' }}>Residencial</option>
                        <option value="COMERCIAL" {{ request('zonificacion') == 'COMERCIAL' ? 'selected' : '' }}>Comercial</option>
                        <option value="INDUSTRIAL" {{ request('zonificacion') == 'INDUSTRIAL' ? 'selected' : '' }}>Industrial</option>
                        <option value="MIXTO" {{ request('zonificacion') == 'MIXTO' ? 'selected' : '' }}>Mixto</option>
                    </select>
                </div>
            </div>

            <!-- Precio -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Precio mínimo</label>
                    <input type="number" name="precio_min" value="{{ request('precio_min') }}" placeholder="$0"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Precio máximo</label>
                    <input type="number" name="precio_max" value="{{ request('precio_max') }}" placeholder="$1,000,000"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg text-sm transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">search</span>
                    Buscar
                </button>
                <a href="{{ route('terrenos.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-6 rounded-lg text-sm transition-colors">
                    Limpiar
                </a>
            </div>
        </form>
    </div>

    <!-- Results -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 pb-12">
        @if($terrenos->isNotEmpty())
            <p class="text-sm text-gray-500 mb-6 font-medium">
                Mostrando {{ $terrenos->firstItem() }} - {{ $terrenos->lastItem() }} de {{ $terrenos->total() }} resultados
            </p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($terrenos as $terreno)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-shadow">
                <div class="relative aspect-[4/3] bg-gray-300 overflow-hidden">
                    @if($terreno->imagenPrincipal)
                        <img src="{{ $terreno->imagenPrincipal }}" 
                            alt="{{ $terreno->nombre }}" 
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-gray-400 text-6xl">landscape</span>
                        </div>
                    @endif
                    <span class="absolute top-4 right-4 bg-white text-green-700 text-[10px] font-black uppercase px-3 py-1 rounded-full">
                        {{ $terreno->estado }}
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="text-xl font-black text-gray-900 line-clamp-1">{{ $terreno->nombre }}</h4>
                        <span class="text-green-700 font-black text-lg">${{ number_format($terreno->precio, 0) }}</span>
                    </div>
                    <p class="text-xs font-medium text-gray-500 mb-3 flex-1 line-clamp-2">
                        {{ $terreno->descripcion }}
                    </p>
                    <p class="text-xs text-gray-400 mb-4 flex items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">location_on</span>
                        {{ $terreno->ubicacion }}
                    </p>
                    <div class="flex gap-4 text-gray-400 text-xs font-semibold mb-6">
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 
                            {{ number_format($terreno->largo * $terreno->ancho, 0) }} m²
                        </span>
                        @if($terreno->zonificacion)
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">map</span>
                            {{ $terreno->zonificacion }}
                        </span>
                        @endif
                    </div>
                    <a href="{{ route('terrenos.show', $terreno->idTerreno) }}"
                        class="w-full bg-gray-50 hover:bg-green-50 text-green-700 font-bold py-3 rounded-lg text-sm text-center transition-colors border border-green-100 block">
                        Ver Detalles
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-16">
                <span class="material-symbols-outlined text-gray-300 text-6xl mb-4">landscape</span>
                <p class="text-gray-500 font-medium text-lg mb-2">No se encontraron terrenos</p>
                <p class="text-gray-400 text-sm">Intenta ajustar los filtros de búsqueda.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($terrenos instanceof \Illuminate\Pagination\LengthAwarePaginator && $terrenos->hasPages())
            <div class="flex justify-center">
                {{ $terrenos->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</main>
@endsection
