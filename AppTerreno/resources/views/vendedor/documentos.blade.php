@extends('layouts.vendedor')

@section('title', 'Mis Documentos | MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight mb-6">Mis Documentos</h1>
        
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

        <!-- General Verification Status Card -->
        <div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-8 flex flex-col md:flex-row items-center gap-8">
            <div class="relative w-32 h-32 flex-shrink-0">
                <!-- Circular SVG Progress Ring -->
                <svg class="w-full h-full transform -rotate-90">
                    <circle class="text-gray-100 dark:text-gray-800" cx="64" cy="64" fill="transparent" r="58" stroke="currentColor" stroke-width="8"></circle>
                    <!-- Perimeter is 2 * pi * 58 = 364.4. Dashoffset = 364.4 - (364.4 * (trustLevel / 100)) -->
                    <circle class="text-[#228b22] transition-all duration-700 ease-out" cx="64" cy="64" fill="transparent" r="58" stroke="currentColor" 
                            stroke-dasharray="364.4" 
                            stroke-dashoffset="{{ 364.4 - (364.4 * ($trustLevel / 100)) }}" 
                            stroke-width="8"></circle>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-2xl font-bold text-[#228b22]">{{ $trustLevel }}%</span>
                </div>
            </div>
            <div class="flex-grow text-center md:text-left">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Estado de Verificación General: {{ $trustLevel }}% completado</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl leading-relaxed">Completa tu perfil subiendo tus documentos. <strong class="text-green-700 dark:text-green-400">IMPORTANTE:</strong> Para poder publicar nuevos terrenos o editar tus propiedades, debes contar con al menos el <strong class="text-green-700 dark:text-green-400">80% de tus documentos aprobados</strong> (equivalente a 4 documentos validados).</p>
            </div>
            <div class="hidden lg:block">
                <span class="material-symbols-outlined text-6xl text-green-700/20 dark:text-green-500/20">verified_user</span>
            </div>
        </div>
    </div>

    <!-- Section 1: Identidad -->
    <div class="mb-12">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400">badge</span>
            Documentación de Identidad
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- SLOT 1: INE -->
            @include('vendedor.components.document-card', ['doc' => $ineDoc, 'title' => 'Identificación Oficial (INE)', 'name' => 'INE', 'desc' => 'Frente y reverso legibles.'])

            <!-- SLOT 2: CURP -->
            @include('vendedor.components.document-card', ['doc' => $curpDoc, 'title' => 'Clave Única de Registro (CURP)', 'name' => 'CURP', 'desc' => 'Formato digital PDF reciente.'])

            <!-- SLOT 3: RFC -->
            @include('vendedor.components.document-card', ['doc' => $rfcDoc, 'title' => 'Registro Federal de Contribuyentes', 'name' => 'RFC', 'desc' => 'Cédula de Identificación Fiscal.'])
        </div>
    </div>

    <!-- Section 2: Domicilio y SAT -->
    <div class="mb-12">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400">location_on</span>
            Validación de Domicilio y Fiscal
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- SLOT 4: Comprobante Domicilio -->
            @include('vendedor.components.document-card-row', ['doc' => $comprobanteDoc, 'title' => 'Comprobante de Domicilio', 'name' => 'Comprobante Domicilio', 'desc' => 'Recibo de luz, agua o telefonía fija (máximo 3 meses).'])

            <!-- SLOT 5: Opinión SAT (32-D) -->
            @include('vendedor.components.document-card-row', ['doc' => $satDoc, 'title' => 'Opinión del SAT (32-D)', 'name' => 'Opinión SAT', 'desc' => 'Obligatorio para verificar régimen fiscal activo.'])
        </div>
    </div>

    <!-- Section 3: Banco y Pago -->
    <div class="mb-12 border-t border-gray-200 dark:border-gray-800 pt-12">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400">payments</span>
            Datos de Pago
        </h3>
        <div class="max-w-md">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-900 dark:bg-slate-800 rounded-full flex items-center justify-center text-white">
                            <span class="material-symbols-outlined">account_balance_wallet</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Estado de Cuenta Bancaria</h4>
                            <p class="text-xs text-gray-500">Para depósitos de apartados</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-green-600">verified</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Banco:</span>
                        <span class="font-medium text-gray-900 dark:text-white">BBVA México (Fijo)</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">RFC Vendedor:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $vendedor->rfc ?? 'No registrado' }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Utilidad Acordada:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ number_format($vendedor->utilidad, 2) }}%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DEMO & TESTING SECTION: ADMIN DOCUMENT VALIDATION SIMULATOR -->
    <div class="mt-16 bg-slate-900 text-white rounded-2xl border border-slate-800 p-8 shadow-xl">
        <div class="flex items-center gap-3 mb-4">
            <span class="material-symbols-outlined text-[#228b22]">terminal</span>
            <h3 class="text-xl font-bold">Simulador de Validación de Administración (Modo Demo)</h3>
        </div>
        <p class="text-sm text-slate-400 mb-6">
            Como no hay un panel de control administrativo implementado por el momento, esta herramienta de demostración te permite <strong>aprobar</strong> o <strong>rechazar</strong> al instante los documentos que subas para que pruebes cómo responde la interfaz del vendedor.
        </p>

        @php
            $pendingDocs = $documentos->where('estado', 'PENDIENTE');
        @endphp

        @if($pendingDocs->isEmpty())
            <div class="p-6 bg-slate-800/40 rounded-xl text-center text-slate-500 border border-dashed border-slate-700">
                <span class="material-symbols-outlined text-3xl mb-2 text-slate-600">hourglass_empty</span>
                <p class="text-sm font-semibold">No hay documentos en revisión</p>
                <p class="text-xs mt-1">Sube un documento en cualquiera de los slots de arriba para que aparezca aquí y puedas validarlo.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($pendingDocs as $pendingDoc)
                    <div class="bg-slate-800/70 p-4 rounded-xl border border-slate-700 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-white">{{ $pendingDoc->nombre }}</span>
                                <span class="px-2 py-0.5 bg-yellow-500/20 text-yellow-500 rounded text-[10px] font-bold uppercase tracking-wider">PENDIENTE</span>
                            </div>
                            <p class="text-xs text-slate-400 mt-1">Subido por el vendedor. Archivo: <a href="{{ asset('storage/' . $pendingDoc->ruta_archivo) }}" target="_blank" class="text-primary hover:underline font-semibold inline-flex items-center gap-0.5"><span class="material-symbols-outlined text-xs">download</span> Descargar</a></p>
                        </div>
                        
                        <!-- Simulation Action Form -->
                        <form action="{{ route('vendedor.documentos.simular', $pendingDoc->idDocumento) }}" method="POST" class="w-full md:w-auto flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                            @csrf
                            <input type="text" name="motivo_rechazo" placeholder="Motivo de rechazo (si aplica)" class="text-xs bg-slate-900 border border-slate-700 rounded-lg py-2 px-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary">
                            
                            <div class="flex gap-2">
                                <button type="submit" name="estado" value="APROBADO" class="flex-1 bg-[#228b22] text-white hover:bg-green-700 text-xs font-bold py-2 px-4 rounded-lg transition-colors">
                                    Aprobar
                                </button>
                                <button type="submit" name="estado" value="RECHAZADO" class="flex-1 bg-red-600 text-white hover:bg-red-700 text-xs font-bold py-2 px-4 rounded-lg transition-colors">
                                    Rechazar
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
