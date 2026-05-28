@extends('layouts.app')

@section('title', 'Maz Terrenos - ' . ($terreno->nombre ?? 'Terreno'))

@php
    $css_file = 'detalles-terreno';
@endphp

@section('content')
<main class="pt-32 pb-24 max-w-6xl mx-auto px-6">
    <header class="text-center mb-12">
        <h1 class="text-5xl md:text-7xl mb-4 tracking-tight text-brand-green">{{ $terreno->nombre }}</h1>
        <div class="flex items-center justify-center gap-2 text-slate-500 mb-4">
            <span class="material-symbols-outlined text-green-700 text-sm">location_on</span>
            <span class="font-body text-sm uppercase tracking-widest">{{ $terreno->ubicacion }}</span>
        </div>
        <div class="flex items-center justify-center gap-3 mb-8">
            <x-badge-terreno-verificacion :estadoVerificacion="$terreno->estado_verificacion" :motivoRechazo="$terreno->motivo_rechazo" tamano="md" />
        </div>
        <div class="inline-block px-8 py-3 bg-green-50 rounded-full border border-green-200">
            <span class="text-2xl font-body font-bold text-green-700 tracking-tight">${{ number_format($terreno->precio, 0) }} MXN</span>
        </div>
    </header>

    <!-- Hero Gallery & Key Features -->
    <section class="relative mb-20">
        <div class="w-full aspect-[21/9] rounded-xl overflow-hidden shadow-2xl relative">
            @if($terreno->imagenPrincipal)
                <img class="w-full h-full object-cover"
                    src="{{ $terreno->imagenPrincipal }}"
                    alt="{{ $terreno->nombre }}" />
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <span class="material-symbols-outlined text-gray-400 text-6xl">landscape</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 px-4 -mt-12 relative z-10">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
                <span class="material-symbols-outlined text-green-700 mb-2">square_foot</span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">
                    {{ number_format($terreno->largo * $terreno->ancho, 0) }} m²
                </span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
                <span class="material-symbols-outlined text-green-700 mb-2">map</span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">
                    {{ $terreno->zonificacion ?? 'Sin especificar' }}
                </span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
                <span class="material-symbols-outlined text-green-700 mb-2">landscape</span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">
                    {{ $terreno->pendiente ?? 'Sin especificar' }}
                </span>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-green-200 flex flex-col items-center text-center">
                <span class="material-symbols-outlined text-green-700 mb-2">check_circle</span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-gray-500">
                    {{ $terreno->estado }}
                </span>
            </div>
        </div>
    </section>

    <!-- Gallery Thumbnails -->
    @if(count($terreno->imagenes) > 1)
    <section class="mb-12">
        <div class="flex gap-4 overflow-x-auto pb-4">
            @foreach($terreno->imagenes as $index => $imagen)
            <div class="flex-shrink-0 w-32 h-24 rounded-lg overflow-hidden border-2 border-transparent hover:border-green-500 transition-colors cursor-pointer">
                <img src="{{ $imagen }}" 
                    alt="Imagen {{ $index + 1 }}" 
                    class="w-full h-full object-cover">
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- Two Column Layout: Content & Seller -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 items-start">
        <!-- Left: Description & Tech Details -->
        <div class="lg:col-span-2 space-y-12">
            <div>
                <h2 class="text-3xl font-serif mb-6 text-green-700">Descripción</h2>
                <p class="text-gray-600 font-body leading-relaxed text-lg">
                    {{ $terreno->descripcion }}
                </p>
            </div>

            <div class="bg-green-50 p-8 rounded-xl">
                <h2 class="text-2xl font-serif mb-6 text-green-700">Detalles Técnicos</h2>
                <div class="grid grid-cols-2 gap-y-6">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Largo</p>
                        <p class="font-body font-semibold">{{ $terreno->largo }} m</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Ancho</p>
                        <p class="font-body font-semibold">{{ $terreno->ancho }} m</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Superficie</p>
                        <p class="font-body font-semibold">{{ number_format($terreno->largo * $terreno->ancho, 0) }} m²</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Estado</p>
                        <p class="font-body font-semibold text-green-700">{{ $terreno->estado }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Zonificación</p>
                        <p class="font-body font-semibold">{{ $terreno->zonificacion ?? 'No especificada' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Pendiente</p>
                        <p class="font-body font-semibold">{{ $terreno->pendiente ?? 'No especificada' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Seller Card -->
        <aside class="space-y-8 sticky top-36">
            @if($terreno->usuario)
            @php
                $documentos = $terreno->usuario->vendedor->documentos ?? collect();
                $aprobados = $documentos->where('estado', 'APROBADO')->count();
                $nivelConfianza = min($aprobados * 20, 100);
                $verificado = $nivelConfianza >= 80;
            @endphp
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 mb-6">DATOS DEL VENDEDOR</p>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-green-700 text-2xl">person</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $terreno->usuario->nombre }}</h3>
                        <p class="text-sm font-body text-slate-500 italic">Vendedor</p>
                    </div>
                </div>
                <div class="mb-6">
                    <x-badge-verificacion :verificado="$verificado" :nivelConfianza="$nivelConfianza" tamano="md" />
                </div>
                <button class="w-full py-4 bg-green-700 text-white rounded-full font-body font-bold text-xs uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-green-800 transition-colors">
                    <span class="material-symbols-outlined text-sm">call</span>
                    Contactar Vendedor
                </button>
            </div>
            @endif

            <!-- Contact Form -->
            <div class="p-8 border border-gray-200 rounded-xl">
                <h2 class="text-xl font-bold mb-6 text-gray-800">Solicitar Información</h2>
                <form class="space-y-4">
                    <input class="w-full bg-transparent border-0 border-b border-gray-300 focus:ring-0 focus:border-green-700 text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="NOMBRE COMPLETO" type="text" />
                    <input class="w-full bg-transparent border-0 border-b border-gray-300 focus:ring-0 focus:border-green-700 text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="EMAIL" type="email" />
                    <textarea class="w-full bg-transparent border-0 border-b border-gray-300 focus:ring-0 focus:border-green-700 text-sm font-body uppercase tracking-wider px-0 py-3 placeholder:text-slate-300" placeholder="MENSAJE" rows="3"></textarea>
                    <button class="w-full py-4 mt-4 bg-green-700 text-white rounded-full font-body font-extrabold text-xs uppercase tracking-[0.15em] shadow-lg shadow-green-700/20 hover:bg-green-800 transition-colors">
                        ENVIAR MENSAJE
                    </button>
                </form>
            </div>
        </aside>
    </div>
</main>
@endsection