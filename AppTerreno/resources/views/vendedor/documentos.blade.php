@extends('layouts.vendedor')

@section('title', 'Mis Documentos | MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-12">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white tracking-tight mb-6">Mis Documentos</h1>
        {{-- TODO_BACKEND (MERGE): El porcentaje de verificación y el estado debe calcularse en el controlador dependiendo de cuántos documentos están aprobados. --}}
        <div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-8 flex flex-col md:flex-row items-center gap-8">
            <div class="relative w-32 h-32 flex-shrink-0">
                <svg class="w-full h-full transform -rotate-90">
                    <circle class="text-gray-100 dark:text-gray-800" cx="64" cy="64" fill="transparent" r="58" stroke="currentColor" stroke-width="8"></circle>
                    <circle class="text-[#228b22]" cx="64" cy="64" fill="transparent" r="58" stroke="currentColor" stroke-dasharray="364.4" stroke-dashoffset="54.6" stroke-width="8"></circle>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-2xl font-bold text-[#228b22]">85%</span>
                </div>
            </div>
            <div class="flex-grow text-center md:text-left">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Estado de Verificación General: 85% completado</h2>
                <p class="text-gray-500 dark:text-gray-400 max-w-2xl leading-relaxed">Completa tu perfil para aumentar la confianza de los compradores. Un vendedor verificado tiene un 40% más de probabilidades de cerrar una venta exitosa.</p>
            </div>
            <div class="hidden lg:block">
                <span class="material-symbols-outlined text-6xl text-green-700/20 dark:text-green-500/20" data-icon="verified_user">verified_user</span>
            </div>
        </div>
    </div>

    <!-- Section 1: Identidad -->
    {{-- TODO_BACKEND (MERGE): Los status de 'Aprobado', 'Pendiente' y 'Rechazado' deben ser dinámicos según el registro del vendedor en la BD. --}}
    <div class="mb-12">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400" data-icon="badge">badge</span>
            Documentación de Identidad
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- INE -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-green-50 dark:bg-green-900/20 rounded-lg text-green-700 dark:text-green-400">
                        <span class="material-symbols-outlined" data-icon="id_card">id_card</span>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-semibold text-green-700 bg-green-100 dark:bg-green-900/40 px-2.5 py-1 rounded-full">
                        <span class="material-symbols-outlined text-sm" data-icon="check_circle" data-weight="fill" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Aprobado
                    </span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Identificación Oficial (INE)</h4>
                <p class="text-xs text-gray-500 mb-6">Frente y reverso legibles.</p>
                {{-- TODO_BACKEND: Enlace para ver el documento subido --}}
                <button class="w-full py-2.5 px-4 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">Ver Documento</button>
            </div>

            <!-- CURP -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-amber-50 dark:bg-amber-900/20 rounded-lg text-amber-600 dark:text-amber-400">
                        <span class="material-symbols-outlined" data-icon="description">description</span>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-semibold text-amber-700 bg-amber-100 dark:bg-amber-900/40 px-2.5 py-1 rounded-full">
                        <span class="material-symbols-outlined text-sm" data-icon="schedule">schedule</span>
                        En Revisión
                    </span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-1">CURP</h4>
                <p class="text-xs text-gray-500 mb-6">Formato digital PDF reciente.</p>
                <button class="w-full py-2.5 px-4 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">Ver Detalles</button>
            </div>

            <!-- RFC -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-red-500/50 shadow-sm hover:shadow-md transition-shadow ring-1 ring-red-500/30">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-red-50 dark:bg-red-900/20 rounded-lg text-red-600 dark:text-red-400">
                        <span class="material-symbols-outlined" data-icon="domain_verification">domain_verification</span>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-semibold text-red-600 bg-red-100 dark:bg-red-900/40 px-2.5 py-1 rounded-full">
                        <span class="material-symbols-outlined text-sm" data-icon="error" data-weight="fill" style="font-variation-settings: 'FILL' 1;">error</span>
                        Rechazado
                    </span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-1">RFC</h4>
                {{-- TODO_BACKEND: Traer el motivo de rechazo desde la BD --}}
                <p class="text-xs text-red-600 font-medium mb-1">Motivo: El documento no es legible</p>
                <p class="text-xs text-gray-500 mb-6">Subir Cédula de Identificación Fiscal.</p>
                {{-- TODO_BACKEND: Lógica para volver a subir el documento o mostrar modal --}}
                <button class="w-full py-2.5 px-4 rounded-lg bg-[#ba1a1a] text-white text-sm font-semibold hover:opacity-90 transition-all shadow-sm">Subir de nuevo</button>
            </div>
        </div>
    </div>

    <!-- Section 2: Domicilio y Fiscal -->
    <div class="mb-12">
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400" data-icon="location_on">location_on</span>
            Validación de Domicilio y Fiscal
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Comprobante Domicilio -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col sm:flex-row items-center gap-6">
                <div class="flex-shrink-0 p-4 bg-gray-50 dark:bg-slate-800 rounded-xl">
                    <span class="material-symbols-outlined text-4xl text-green-700 dark:text-green-400" data-icon="home_pin">home_pin</span>
                </div>
                <div class="flex-grow text-center sm:text-left">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-2">
                        <h4 class="font-bold text-gray-900 dark:text-white">Comprobante de Domicilio</h4>
                        <span class="inline-flex items-center gap-1 text-[10px] uppercase tracking-wider font-bold text-green-700 bg-green-50 dark:bg-green-900/40 px-2 py-0.5 rounded">Aprobado</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-1">Recibo de luz, agua o telefonía fija.</p>
                    <p class="text-[10px] text-gray-400">Última actualización hace 2 días</p>
                </div>
                <button class="text-green-700 dark:text-green-400 font-bold text-sm hover:underline">Ver</button>
            </div>

            <!-- Opinión SAT -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm flex flex-col sm:flex-row items-center gap-6 border-dashed">
                <div class="flex-shrink-0 p-4 bg-gray-50 dark:bg-slate-800 rounded-xl">
                    <span class="material-symbols-outlined text-4xl text-gray-400 dark:text-gray-500" data-icon="account_balance">account_balance</span>
                </div>
                <div class="flex-grow text-center sm:text-left">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-2">
                        <h4 class="font-bold text-gray-900 dark:text-white">Opinión del SAT (32-D)</h4>
                        <span class="inline-flex items-center gap-1 text-[10px] uppercase tracking-wider font-bold text-gray-500 bg-gray-100 dark:bg-slate-800 px-2 py-0.5 rounded">Pendiente</span>
                    </div>
                    <p class="text-sm text-gray-500">Obligatorio para vendedores corporativos.</p>
                </div>
                <button class="bg-[#228b22] text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:opacity-90 transition-colors">Subir Documento</button>
            </div>
        </div>
    </div>

    <!-- Section 3: Datos de Pago -->
    <div>
        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-green-700 dark:text-green-400" data-icon="payments">payments</span>
            Datos de Pago
        </h3>
        <div class="max-w-md">
            {{-- TODO_BACKEND: Llenar el banco y la clabe dinámica con `$vendedor->banco` --}}
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-900 dark:bg-gray-800 rounded-full flex items-center justify-center text-white">
                            <span class="material-symbols-outlined" data-icon="account_balance_wallet">account_balance_wallet</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white">Estado de Cuenta Bancaria</h4>
                            <p class="text-xs text-gray-500">Para depósitos de apartados</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-green-600" data-icon="verified" data-weight="fill" style="font-variation-settings: 'FILL' 1;">verified</span>
                </div>
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Banco:</span>
                        <span class="font-medium text-gray-900 dark:text-white">BBVA México</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">CLABE:</span>
                        <span class="font-medium text-gray-900 dark:text-white">**** **** **** 4592</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Estado:</span>
                        <span class="text-green-700 font-semibold">Aprobado</span>
                    </div>
                </div>
                <button class="w-full flex items-center justify-center gap-2 py-2 text-gray-600 dark:text-gray-300 font-semibold text-sm border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-slate-800">
                    <span class="material-symbols-outlined text-sm" data-icon="edit">edit</span>
                    Actualizar datos
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
