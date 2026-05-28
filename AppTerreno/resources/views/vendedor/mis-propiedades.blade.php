@extends('layouts.vendedor')

@section('title', 'Mis Propiedades | MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mis Propiedades</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona y monitorea el rendimiento de tus terrenos publicados.</p>
        </div>
        <a href="{{ route('vendedor.terrenos.create') }}" class="flex items-center justify-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold hover:opacity-90 active:opacity-80 transition-all shadow-md">
            <span class="material-symbols-outlined">add_circle</span>
            Publicar Nuevo Terreno
        </a>
    </div>

    <!-- Feedback Alerts -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-800 rounded-xl flex items-center gap-3">
            <span class="material-symbols-outlined text-red-600">error</span>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Property List -->
    <div class="space-y-6">
        @forelse($terrenos as $terreno)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden flex flex-col lg:flex-row hover:shadow-md transition-all duration-300">
                <!-- Terrain Image Section -->
                <div class="relative lg:w-72 h-48 lg:h-auto overflow-hidden bg-gray-100">
                    @if($terreno->imagenPrincipal)
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $terreno->imagenPrincipal }}" alt="{{ $terreno->nombre }}" />
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                            <span class="material-symbols-outlined text-5xl">landscape</span>
                            <span class="text-xs mt-1">Sin imagen</span>
                        </div>
                    @endif

                    <!-- Dynamic Badge + Estado Dropdown -->
                    <div class="absolute top-4 left-4 flex flex-col gap-2">
                        <form action="{{ route('vendedor.terrenos.cambiarEstado', $terreno->idTerreno) }}" method="POST" class="inline-block">
                            @csrf
                            <select name="estado" onchange="this.form.submit()" class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md border cursor-pointer focus:ring-1 focus:ring-primary focus:border-primary
                                @if($terreno->estado === 'DISPONIBLE') bg-green-100 text-green-800 border-green-200
                                @elseif($terreno->estado === 'EN_PROCESO') bg-amber-100 text-amber-800 border-amber-200
                                @elseif($terreno->estado === 'RESERVADO') bg-blue-100 text-blue-800 border-blue-200
                                @else bg-gray-200 text-gray-800 border-gray-300 @endif">
                                <option value="DISPONIBLE" {{ $terreno->estado === 'DISPONIBLE' ? 'selected' : '' }}>Disponible</option>
                                <option value="EN_PROCESO" {{ $terreno->estado === 'EN_PROCESO' ? 'selected' : '' }}>En Proceso</option>
                                <option value="RESERVADO" {{ $terreno->estado === 'RESERVADO' ? 'selected' : '' }}>Apartado</option>
                                <option value="VENDIDO" {{ $terreno->estado === 'VENDIDO' ? 'selected' : '' }}>Vendido</option>
                            </select>
                        </form>
                        <x-badge-terreno-verificacion :estadoVerificacion="$terreno->estado_verificacion" :motivoRechazo="$terreno->motivo_rechazo" />
                    </div>
                </div>

                <!-- Terrain Details Section -->
                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Main Info -->
                        <div class="space-y-2">
                            <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $terreno->nombre }}</h3>
                            <div class="flex items-center text-gray-500 gap-1 text-sm">
                                <span class="material-symbols-outlined text-sm">location_on</span>
                                {{ $terreno->ubicacion }}
                            </div>
                            <div class="mt-4">
                                <span class="block text-2xl font-black text-primary">${{ number_format($terreno->precio, 2) }} MXN</span>
                                <span class="text-xs text-gray-400 font-medium">
                                    ${{ number_format($terreno->precio / ($terreno->superficie > 0 ? $terreno->superficie : 1), 2) }} / m²
                                </span>
                            </div>
                        </div>

                        <!-- Technical Metrics -->
                        <div class="flex flex-col justify-center space-y-4 px-0 md:px-6 md:border-x border-gray-100">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">Dimensiones:</span>
                                <span class="font-bold text-gray-900">{{ number_format($terreno->largo) }}m x {{ number_format($terreno->ancho) }}m</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">Superficie:</span>
                                <span class="font-bold text-gray-900">{{ number_format($terreno->superficie) }} m²</span>
                            </div>
                            @if($terreno->zonificacion)
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-500">Zonificación:</span>
                                    <span class="font-bold text-gray-900">{{ $terreno->zonificacion }}</span>
                                </div>
                            @endif
                            @if($terreno->pendiente)
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-500">Pendiente:</span>
                                    <span class="font-bold text-gray-900">{{ $terreno->pendiente }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col justify-center gap-2">
                            @if($terreno->estado_verificacion === 'APROBADO')
                                <span class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-gray-100 text-gray-400 font-semibold text-sm cursor-not-allowed select-none">
                                    <span class="material-symbols-outlined text-lg">lock</span>
                                    Ya Verificado
                                </span>
                            @elseif($terreno->estado_verificacion === 'RECHAZADO')
                                <a href="{{ route('vendedor.terrenos.validarForm', $terreno->idTerreno) }}" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-red-600 text-white font-semibold text-sm hover:bg-red-700 transition-colors">
                                    <span class="material-symbols-outlined text-lg">error</span>
                                    Revisar Terreno
                                </a>
                            @else
                                <a href="{{ route('vendedor.terrenos.validarForm', $terreno->idTerreno) }}" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-green-700 transition-colors">
                                    <span class="material-symbols-outlined text-lg">verified</span>
                                    Validar Terreno
                                </a>
                            @endif
                            <a href="{{ route('vendedor.terrenos.edit', $terreno->idTerreno) }}" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition-colors">
                                <span class="material-symbols-outlined text-lg">edit</span>
                                Editar Terreno
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                <span class="material-symbols-outlined text-5xl text-gray-400 mb-4">landscape</span>
                <h3 class="text-lg font-bold text-gray-900 mb-1">No tienes propiedades publicadas</h3>
                <p class="text-gray-500 text-sm mb-6">Comienza hoy a listar tus terrenos para venderlos con rapidez.</p>
                <a href="{{ route('vendedor.terrenos.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-5 py-2.5 rounded-lg font-bold hover:opacity-95 transition-opacity shadow-md">
                    <span class="material-symbols-outlined text-sm">add_circle</span> Publicar Nuevo Terreno
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
