@extends('layouts.vendedor')

@section('title', 'Mis Propiedades | MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Propiedades</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona y monitorea el rendimiento de tus terrenos publicados.</p>
        </div>
        <a href="{{ route('vendedor.terrenos.create') }}" class="flex items-center justify-center gap-2 bg-[#228b22] text-white px-6 py-3 rounded-lg font-bold hover:opacity-90 active:opacity-80 transition-all shadow-md">
            <span class="material-symbols-outlined">add_circle</span>
            Publicar Nuevo Terreno
        </a>
    </div>

    <!-- Feedback Alerts -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-300 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-800 dark:text-red-300 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-red-600">error</span>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Property List -->
    <div class="space-y-6">
        @forelse($terrenos as $terreno)
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden flex flex-col lg:flex-row hover:shadow-md transition-all duration-300">
                <!-- Terrain Image Section -->
                <div class="relative lg:w-72 h-48 lg:h-auto overflow-hidden bg-slate-100 dark:bg-slate-800">
                    @if($terreno->imagenPrincipal)
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $terreno->imagenPrincipal }}" alt="{{ $terreno->nombre }}" />
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                            <span class="material-symbols-outlined text-5xl">landscape</span>
                            <span class="text-xs mt-1">Sin imagen</span>
                        </div>
                    @endif

                    <!-- Dynamic Badge -->
                    @if($terreno->estado === 'DISPONIBLE')
                        <div class="absolute top-4 left-4 bg-green-100 dark:bg-green-900/80 text-green-800 dark:text-green-200 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md border border-green-200 dark:border-green-800">
                            Disponible
                        </div>
                    @elseif($terreno->estado === 'RESERVADO')
                        <div class="absolute top-4 left-4 bg-blue-100 dark:bg-blue-900/80 text-blue-800 dark:text-blue-200 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md border border-blue-200 dark:border-blue-800">
                            Apartado
                        </div>
                    @else
                        <div class="absolute top-4 left-4 bg-slate-200 dark:bg-slate-800 text-slate-800 dark:text-slate-200 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md border border-slate-300 dark:border-slate-700">
                            Vendido
                        </div>
                    @endif
                </div>

                <!-- Terrain Details Section -->
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Main Info -->
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">{{ $terreno->nombre }}</h3>
                            <div class="flex items-center text-gray-500 gap-1 text-sm">
                                <span class="material-symbols-outlined text-sm">location_on</span>
                                {{ $terreno->ubicacion }}
                            </div>
                            <div class="mt-4">
                                <span class="block text-2xl font-black text-[#228b22] dark:text-green-400">${{ number_format($terreno->precio, 2) }} MXN</span>
                                <span class="text-xs text-gray-400 font-medium">
                                    ${{ number_format($terreno->precio / ($terreno->superficie > 0 ? $terreno->superficie : 1), 2) }} / m²
                                </span>
                            </div>
                        </div>

                        <!-- Technical Metrics -->
                        <div class="flex flex-col justify-center space-y-4 px-0 md:px-6 md:border-x border-gray-100 dark:border-gray-800">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">Dimensiones:</span>
                                <span class="font-bold text-gray-900 dark:text-white">{{ number_format($terreno->largo) }}m x {{ number_format($terreno->ancho) }}m</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">Superficie:</span>
                                <span class="font-bold text-gray-900 dark:text-white">{{ number_format($terreno->superficie) }} m²</span>
                            </div>
                            @if($terreno->zonificacion)
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-500">Zonificación:</span>
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $terreno->zonificacion }}</span>
                                </div>
                            @endif
                            @if($terreno->pendiente)
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-500">Pendiente:</span>
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $terreno->pendiente }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col justify-center gap-2">
                            <a href="{{ route('vendedor.terrenos.edit', $terreno->idTerreno) }}" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                                <span class="material-symbols-outlined text-lg">edit</span>
                                Editar Terreno
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-12 text-center">
                <span class="material-symbols-outlined text-5xl text-gray-400 mb-4">landscape</span>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">No tienes propiedades publicadas</h3>
                <p class="text-gray-500 text-sm mb-6">Comienza hoy a listar tus terrenos para venderlos con rapidez.</p>
                <a href="{{ route('vendedor.terrenos.create') }}" class="inline-flex items-center gap-2 bg-[#228b22] text-white px-5 py-2.5 rounded-lg font-bold hover:opacity-95 transition-opacity shadow-md">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Publicar Nuevo Terreno
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection