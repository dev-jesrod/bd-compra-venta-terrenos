@extends('layouts.app')

@section('title', 'Maz Terrenos - Home')

@php
$css_file = 'homePage';
@endphp

@section('content')
<main class="flex-1 bg-white">
    <!-- Hero Section -->
    <div class="flex flex-col lg:flex-row min-h-[600px]">
        <!-- Left: Image Placeholder -->
        <div class="lg:w-1/2 relative bg-gray-300 min-h-[400px] lg:min-h-full flex items-center justify-center">

            <img src="{{ asset('storage/IMG/IMG-Portada.jpg') }}" class="absolute inset-0 w-full h-full object-cover">


            <!-- Overlay Text -->
            <div class="absolute inset-0 bg-black/30 flex flex-col justify-end p-10 lg:p-16">
                <h1 class="text-white text-5xl lg:text-5xl font-black leading-tight mb-4">Encuentra tu<br>lugar ideal en
                    la<br>naturaleza</h1>
                <p class="text-white/90 text-xl font-medium">Invierte en tu futuro con sostenibilidad y estilo.</p>
            </div>
        </div>

        <!-- Right: Content -->
        <div class="lg:w-1/2 flex flex-col items-center justify-center p-10 lg:p-20 text-center">
            <div class="w-16 h-16 rounded-full border-2 border-green-600 flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-green-600 text-3xl">home_work</span>
            </div>
            <h2 class="text-5xl lg:text-7xl font-black text-green-700 tracking-wider mb-6 leading-none">MAZ<br>TERRENOS
            </h2>
            <p class="text-gray-600 text-sm font-medium leading-relaxed max-w-sm mb-10">
                Bienvenido a <span class="font-bold">maz terrenos</span>. Descubre una forma consciente de habitar el
                mundo.
            </p>
            <a href="{{ route('terrenos.index') }}"
                class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg mb-10 flex items-center gap-2 transition-colors">
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                Ver Terrenos
            </a>
            <div class="w-full max-w-md flex items-center bg-gray-50 border border-gray-200 rounded-xl p-1 shadow-sm">
                <span class="material-symbols-outlined text-gray-400 ml-4">search</span>
                <input type="text" placeholder="¿Qué tipo de terreno buscas?"
                    class="flex-1 bg-transparent border-none focus:ring-0 text-sm px-4" />
                <button class="bg-green-700 text-white px-6 py-2 rounded-lg font-bold text-sm flex items-center gap-1">
                    Empezar <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Featured Properties Section -->
    <div class="max-w-7xl mx-auto px-6 md:px-20 py-20">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h3 class="text-3xl font-black text-gray-900 mb-2">Propiedades Destacadas</h3>
                <p class="text-gray-500 font-medium text-sm">Las mejores oportunidades de inversión en entornos
                    naturales.</p>
            </div>
            <a href="{{ route('terrenos.index') }}" class="text-green-700 font-bold text-sm flex items-center hover:underline">
                Explorar todo <span class="material-symbols-outlined text-[18px] ml-1">arrow_forward</span>
            </a>
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
                <p class="text-gray-500 font-medium">No hay terrenos disponibles actualmente.</p>
            </div>
            @endforelse
        </div>

        <div class="flex justify-center mb-8">
            <a href="{{ route('terrenos.index') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-4 px-8 rounded-xl transition-colors">
                Ver más propiedades
            </a>
        </div>
</main>
@endsection