@extends('layouts.app')

@section('title', 'Catálogo de Terrenos | Maz Terrenos')

@php
    $css_file = 'homePage';
@endphp

@section('content')
<main class="flex-1 bg-white">
    <!-- Header del Catálogo -->
    <div class="bg-green-700 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 md:px-20">
            <h1 class="text-4xl font-black mb-2">Catálogo de Terrenos</h1>
            <p class="text-green-100 font-medium">Explora todas las propiedades disponibles en Maz Terrenos</p>
        </div>
    </div>

    <!-- Sección de Filtros y Búsqueda -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 py-8">
        <form method="GET" action="{{ route('terrenos.index') }}" class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Búsqueda -->
                <div class="lg:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Buscar</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 material-symbols-outlined">search</span>
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" 
                            placeholder="Buscar por nombre o ubicación..."
                            class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <!-- Precio Mínimo -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Precio Mínimo</label>
                    <input type="number" name="precio_min" value="{{ request('precio_min') }}" 
                        placeholder="Desde"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Precio Máximo -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Precio Máximo</label>
                    <input type="number" name="precio_max" value="{{ request('precio_max') }}" 
                        placeholder="Hasta"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                </div>

                <!-- Estado -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Estado</label>
                    <select name="estado" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                        <option value="">Todos</option>
                        <option value="DISPONIBLE" {{ request('estado') == 'DISPONIBLE' ? 'selected' : '' }}>Disponible</option>
                        <option value="RESERVADO" {{ request('estado') == 'RESERVADO' ? 'selected' : '' }}>Reservado</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 flex gap-4">
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                    <span class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">filter_list</span>
                        Filtrar
                    </span>
                </button>
                <a href="{{ route('terrenos.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded-lg transition-colors">
                    Limpiar Filtros
                </a>
            </div>
        </form>
    </div>

    <!-- Resultados -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 py-8">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-black text-gray-900">Terrenos Disponibles</h2>
                <p class="text-gray-500 font-medium text-sm">{{ $terrenos->total() }} propiedades encontradas</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($terrenos as $terreno)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
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
            <div class="col-span-full text-center py-12">
                <span class="material-symbols-outlined text-gray-300 text-6xl mb-4">landscape</span>
                <p class="text-gray-500 font-medium text-lg">No se encontraron terrenos con los filtros seleccionados.</p>
                <a href="{{ route('terrenos.index') }}" class="text-green-700 font-bold hover:underline mt-4 inline-block">
                    Ver todos los terrenos
                </a>
            </div>
            @endforelse
        </div>

        <!-- Paginación -->
        @if($terrenos->hasPages())
        <div class="flex justify-center">
            {{ $terrenos->links() }}
        </div>
        @endif
    </div>
</main>
@endsection