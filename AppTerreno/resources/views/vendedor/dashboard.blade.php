@extends('layouts.vendedor')

@section('title', 'Panel de Control | MAZ TERRENOS')

@section('content')
<!-- Notification Messages -->
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

<!-- Control Panel Header -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-900">Panel de Control</h2>
        <p class="text-gray-500 mt-1">Gestiona tus publicaciones y revisa el rendimiento de tus terrenos.</p>
    </div>
    <a href="{{ route('vendedor.terrenos.create') }}"
        class="bg-[#228B22] text-white px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-green-700 transition-all active:scale-95 shadow-lg">
        <span class="material-symbols-outlined">add_circle</span>
        Publicar Nuevo Terreno
    </a>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Stat 1: Total Vistas -->
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-green-50 rounded-lg">
                <span class="material-symbols-outlined text-[#228B22]">visibility</span>
            </div>
            <span class="text-green-600 text-sm font-bold bg-green-50 px-2 py-1 rounded">+12%</span>
        </div>
        <p class="text-gray-500 text-sm font-medium">Total Vistas (Simulado)</p>
        <h3 class="text-3xl font-extrabold mt-1 text-gray-900">{{ number_format($totalVistas) }}</h3>
    </div>

    <!-- Stat 2: Prospectos Nuevos -->
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-blue-50 rounded-lg">
                <span class="material-symbols-outlined text-blue-700">chat_bubble</span>
            </div>
            <span class="text-green-600 text-sm font-bold bg-green-50 px-2 py-1 rounded">+5%</span>
        </div>
        <p class="text-gray-500 text-sm font-medium">Nuevos prospectos</p>
        <h3 class="text-3xl font-extrabold mt-1 text-gray-900">{{ $totalProspectos }}</h3>
    </div>

    <!-- Stat 3: Apartados Activos -->
    <div class="bg-[#228B22] text-white p-6 rounded-xl border border-[#228B22] shadow-sm">
        <div class="flex justify-between items-start mb-4">
            <div class="p-3 bg-white/20 rounded-lg text-white">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bookmark</span>
            </div>
        </div>
        <p class="text-white/80 text-sm font-medium">Apartados Activos</p>
        <h3 class="text-3xl font-extrabold mt-1">{{ $apartadosActivos }}</h3>
    </div>
</div>

<!-- Verification Status Banner -->
<div class="bg-white text-gray-900 p-8 rounded-xl mb-12 flex flex-col md:flex-row gap-8 items-center border border-gray-200 shadow-sm">
    <div class="flex-1 w-full">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2">
            <h3 class="text-xl font-bold">Estado de Verificación del Vendedor</h3>
            <a href="{{ route('vendedor.documentos.index') }}" class="text-xs text-[#228B22] font-bold hover:underline flex items-center gap-1">
                <span class="material-symbols-outlined text-[#228B22]">edit</span> Gestionar Documentos
            </a>
        </div>
        <!-- Nivel de confianza -->
        <div class="w-full bg-gray-200 rounded-full h-3 mb-4 overflow-hidden">
            <div class="bg-[#228B22] h-3 rounded-full transition-all duration-500" style="width: {{ $trustLevel }}%"></div>
        </div>
        <div class="flex flex-wrap gap-3">
            <!-- INE Badge -->
            @if($ineDoc && $ineDoc->estado === 'APROBADO')
            <span class="px-3 py-1 bg-green-50 border border-green-200 text-green-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">check_circle</span> INE Validada
            </span>
            @elseif($ineDoc && $ineDoc->estado === 'RECHAZADO')
            <span class="px-3 py-1 bg-red-50 border border-red-200 text-red-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">error</span> INE Rechazada
            </span>
            @else
            <span class="px-3 py-1 bg-gray-100 border border-gray-200 text-gray-600 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">schedule</span> INE {{ $ineDoc ? 'En Revisión' : 'Pendiente' }}
            </span>
            @endif

            <!-- RFC Badge -->
            @if($rfcDoc && $rfcDoc->estado === 'APROBADO')
            <span class="px-3 py-1 bg-green-50 border border-green-200 text-green-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">check_circle</span> RFC Verificado
            </span>
            @elseif($rfcDoc && $rfcDoc->estado === 'RECHAZADO')
            <span class="px-3 py-1 bg-red-50 border border-red-200 text-red-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">error</span> RFC Rechazado
            </span>
            @else
            <span class="px-3 py-1 bg-gray-100 border border-gray-200 text-gray-600 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">schedule</span> RFC {{ $rfcDoc ? 'En Revisión' : 'Pendiente' }}
            </span>
            @endif

            <!-- Comprobante Badge -->
            @if($comprobanteDoc && $comprobanteDoc->estado === 'APROBADO')
            <span class="px-3 py-1 bg-green-50 border border-green-200 text-green-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">check_circle</span> Domicilio Aprobado
            </span>
            @elseif($comprobanteDoc && $comprobanteDoc->estado === 'RECHAZADO')
            <span class="px-3 py-1 bg-red-50 border border-red-200 text-red-700 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">error</span> Domicilio Rechazado
            </span>
            @else
            <span class="px-3 py-1 bg-gray-100 border border-gray-200 text-gray-600 rounded-full text-xs font-bold flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">schedule</span> Domicilio {{ $comprobanteDoc ? 'En Revisión' : 'Pendiente' }}
            </span>
            @endif
        </div>
    </div>
    <div class="flex-shrink-0 text-center md:text-right min-w-[120px]">
        <p class="text-gray-400 text-xs mb-1 uppercase tracking-wider font-bold">Confianza</p>
        <p class="text-5xl font-black text-[#228B22]">{{ $trustLevel }}%</p>
    </div>
</div>

<!-- Property Listings Grid -->
<div class="mb-12">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900">Mis Terrenos Publicados</h3>
        <a href="{{ route('vendedor.terrenos.index') }}" class="text-[#228B22] font-bold text-sm hover:underline flex items-center gap-1">
            Ver todos los listados <span class="material-symbols-outlined text-xs">arrow_forward</span>
        </a>
    </div>

    @if($noContent)
    <div class="bg-white rounded-xl p-12 text-center border border-gray-200 shadow-sm">
        <span class="material-symbols-outlined text-5xl text-gray-400 mb-4">landscape</span>
        <h4 class="text-lg font-bold text-gray-900 mb-1">Aún no has publicado ningún terreno</h4>
        <p class="text-gray-500 text-sm mb-6 max-w-md mx-auto">Comienza a publicar tus propiedades para que los clientes potenciales puedan verlas y contactarte.</p>
        <a href="{{ route('vendedor.terrenos.create') }}" class="inline-flex items-center gap-2 bg-[#228B22] text-white px-5 py-2.5 rounded-lg font-bold hover:bg-green-700 transition-colors shadow-md">
            <span class="material-symbols-outlined text-sm">add_circle</span> Publicar mi primer terreno
        </a>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        @foreach($terrenos as $terreno)
        <div class="bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm group hover:shadow-md transition-all duration-300">
            <div class="relative h-48 overflow-hidden bg-gray-100">
                @if($terreno->imagenPrincipal)
                <img alt="{{ $terreno->nombre }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    src="{{ $terreno->imagenPrincipal }}">
                @else
                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                    <span class="material-symbols-outlined text-4xl">image</span>
                    <span class="text-xs mt-1">Sin imagen</span>
                </div>
                @endif

                <!-- Status Badge -->
                @if($terreno->estado === 'DISPONIBLE')
                <div class="absolute top-3 left-3 px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-lg uppercase tracking-tight">
                    ACTIVO
                </div>
                @elseif($terreno->estado === 'RESERVADO')
                <div class="absolute top-3 left-3 px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-lg uppercase tracking-tight">
                    APARTADO
                </div>
                @else
                <div class="absolute top-3 left-3 px-3 py-1 bg-gray-200 text-gray-700 text-xs font-bold rounded-lg uppercase tracking-tight">
                    VENDIDO
                </div>
                @endif
            </div>

            <div class="p-5 flex flex-col justify-between h-44">
                <div>
                    <p class="text-xs text-gray-400 uppercase font-bold tracking-wider mb-1">
                        {{ number_format($terreno->largo) }}m x {{ number_format($terreno->ancho) }}m ({{ number_format($terreno->superficie) }} m²)
                    </p>
                    <h4 class="font-bold text-gray-900 line-clamp-1 mb-1">{{ $terreno->nombre }}</h4>
                    <p class="text-[#228B22] font-extrabold text-lg mb-2">${{ number_format($terreno->precio, 2) }} MXN</p>
                </div>

                <a href="{{ route('vendedor.terrenos.edit', $terreno->idTerreno) }}"
                    class="w-full text-center py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200 transition-colors">
                    Editar Detalles
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Identity Documentation Quick Links -->
<div class="mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900">Estado de Documentación</h3>
        <a href="{{ route('vendedor.documentos.index') }}" class="text-[#228B22] font-bold text-sm hover:underline flex items-center gap-1">
            Ver Todos <span class="material-symbols-outlined text-xs">arrow_forward</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- INE Quick View -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 flex items-center gap-4 shadow-sm">
            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-[#228B22]">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">badge</span>
            </div>
            <div class="flex-grow">
                <h5 class="font-bold text-gray-900 text-sm">INE</h5>
                <span class="text-xs uppercase font-extrabold {{ $ineDoc && $ineDoc->estado === 'APROBADO' ? 'text-green-600' : ($ineDoc && $ineDoc->estado === 'RECHAZADO' ? 'text-red-600' : 'text-amber-500') }}">
                    {{ $ineDoc ? $ineDoc->estado : 'PENDIENTE' }}
                </span>
            </div>
            @if($ineDoc && $ineDoc->estado === 'APROBADO')
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            @elseif($ineDoc && $ineDoc->estado === 'RECHAZADO')
            <span class="material-symbols-outlined text-red-600">error</span>
            @else
            <span class="material-symbols-outlined text-amber-500">schedule</span>
            @endif
        </div>

        <!-- RFC Quick View -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 flex items-center gap-4 shadow-sm">
            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-[#228B22]">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">description</span>
            </div>
            <div class="flex-grow">
                <h5 class="font-bold text-gray-900 text-sm">RFC</h5>
                <span class="text-xs uppercase font-extrabold {{ $rfcDoc && $rfcDoc->estado === 'APROBADO' ? 'text-green-600' : ($rfcDoc && $rfcDoc->estado === 'RECHAZADO' ? 'text-red-600' : 'text-amber-500') }}">
                    {{ $rfcDoc ? $rfcDoc->estado : 'PENDIENTE' }}
                </span>
            </div>
            @if($rfcDoc && $rfcDoc->estado === 'APROBADO')
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            @elseif($rfcDoc && $rfcDoc->estado === 'RECHAZADO')
            <span class="material-symbols-outlined text-red-600">error</span>
            @else
            <span class="material-symbols-outlined text-amber-500">schedule</span>
            @endif
        </div>

        <!-- Comprobante Domicilio Quick View -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 flex items-center gap-4 shadow-sm">
            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-[#228B22]">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_pin</span>
            </div>
            <div class="flex-grow">
                <h5 class="font-bold text-gray-900 text-sm">Comprobante</h5>
                <span class="text-xs uppercase font-extrabold {{ $comprobanteDoc && $comprobanteDoc->estado === 'APROBADO' ? 'text-green-600' : ($comprobanteDoc && $comprobanteDoc->estado === 'RECHAZADO' ? 'text-red-600' : 'text-amber-500') }}">
                    {{ $comprobanteDoc ? $comprobanteDoc->estado : 'PENDIENTE' }}
                </span>
            </div>
            @if($comprobanteDoc && $comprobanteDoc->estado === 'APROBADO')
            <span class="material-symbols-outlined text-green-600">check_circle</span>
            @elseif($comprobanteDoc && $comprobanteDoc->estado === 'RECHAZADO')
            <span class="material-symbols-outlined text-red-600">error</span>
            @else
            <span class="material-symbols-outlined text-amber-500">schedule</span>
            @endif
        </div>
    </div>
</div>
@endsection
