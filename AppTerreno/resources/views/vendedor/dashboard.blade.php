@extends('layouts.vendedor')

@section('title', 'Panel de Control | MAZ TERRENOS')

@section('content')
    <!-- Control Panel Header -->
    <div class="flex justify-between items-end mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Panel de Control</h2>
            <p class="text-gray-500 mt-1">Gestiona tus publicaciones y revisa el rendimiento de tus terrenos.</p>
        </div>
        <!-- TODO: Controlador necesario para mostrar la vista de creación de propiedades -->
        <a href="{{ url('/publicar-terreno') }}"
            class="bg-primary-container text-white px-6 py-3 rounded-lg font-bold flex items-center gap-2 hover:bg-primary transition-all active:scale-95 shadow-lg shadow-green-900/10">
            <span class="material-symbols-outlined">add_circle</span>
            + Publicar Nuevo Terreno
        </a>
    </div>

    <!-- Stats Grid -->
    <!-- TODO: Controlador necesario para calcular y pasar las estadísticas de la cuenta (vistas totales, nuevos prospectos, apartados activos) a la vista -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <span class="material-symbols-outlined text-green-700 dark:text-green-400">visibility</span>
                </div>
                <span class="text-green-600 text-sm font-bold bg-green-50 px-2 py-1 rounded">+12%</span>
            </div>
            <p class="text-gray-500 text-sm font-medium">Total Vistas</p>
            @if($totalVistas > 0)
                <h3 class="text-3xl font-extrabold mt-1">{{ number_format($totalVistas) }}</h3>
            @else
                <h3 class="text-lg font-bold text-red-500 mt-1 italic">Sin registros</h3>
            @endif
        </div>
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <span class="material-symbols-outlined text-blue-700 dark:text-blue-400">chat_bubble</span>
                </div>
                <span class="text-green-600 text-sm font-bold bg-green-50 px-2 py-1 rounded">+5%</span>
            </div>
            <p class="text-gray-500 text-sm font-medium">Nuevos prospectos</p>
            @if($totalProspectos > 0)
                <h3 class="text-3xl font-extrabold mt-1">{{ number_format($totalProspectos) }}</h3>
            @else
                <h3 class="text-lg font-bold text-red-500 mt-1 italic">Sin registros</h3>
            @endif
        </div>
        <div class="bg-tertiary-container p-6 rounded-xl border border-tertiary-container shadow-sm text-white">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-white/20 rounded-lg text-white">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">bookmark</span>
                </div>
            </div>
            <p class="text-white/80 text-sm font-medium">Apartados Activos</p>
            @if($apartadosActivos > 0)
                <h3 class="text-3xl font-extrabold mt-1">{{ number_format($apartadosActivos) }}</h3>
            @else
                <h3 class="text-lg font-bold text-red-300 mt-1 italic">Sin registros</h3>
            @endif
        </div>
    </div>

    <!-- Verification Status Banner -->
    <!-- TODO: Controlador necesario para mostrar estatus de los documentos y calcular el nivel de confianza -->
    <div class="bg-primary-container text-white p-8 rounded-xl mb-12 flex flex-col md:flex-row gap-8 items-center">
        <div class="flex-1">
            <h3 class="text-xl font-bold mb-4">Estado de Verificación del Vendedor</h3>
            <div class="w-full bg-black/10 rounded-full h-3 mb-4">
                <div class="bg-white h-3 rounded-full" style="width: {{ $trustLevel }}%"></div>
            </div>
            <div class="flex flex-wrap gap-3">
                <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold flex items-center gap-1 opacity-60">
                    <span class="material-symbols-outlined text-sm">help</span> INE Pendiente
                </span>
                
                @if($hasRfc)
                <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">check_circle</span> RFC Verificado
                </span>
                @else
                <span class="px-3 py-1 bg-error/40 border border-white/20 rounded-full text-xs font-bold flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">error</span> RFC Pendiente
                </span>
                @endif
                
                <span
                    class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold flex items-center gap-1 opacity-60">
                    <span class="material-symbols-outlined text-sm">help</span> Comprobante Pendiente
                </span>
            </div>
        </div>
        <div class="flex-shrink-0 text-center md:text-right">
            <p class="text-white/80 text-sm mb-1 uppercase tracking-wider font-bold">Nivel de Confianza</p>
            <p class="text-5xl font-black">{{ $trustLevel }}%</p>
        </div>
    </div>

    <!-- Property Listings Grid -->
    <div class="mb-12">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Terrenos Publicados</h3>
            <!-- TODO: Controlador necesario para mostrar la ruta index(listar) de todas las propiedades de este vendedor -->
            <a href="{{ url('/mis-propiedades') }}" class="text-green-700 font-bold text-sm hover:underline">Ver todos los listados</a>
        </div>

        <!-- TODO: Controlador necesario para iterar (p.ej. con foreach) los terrenos del vendedor. -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <!-- Card 1: Activo -->
            <div
                class="bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-sm group">
                <div class="relative h-48">
                    <img alt="Residencial Valle Verde"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxHCnFE_9WIslvjebK7wWLLuvbtMk0mgAEqEDrvAVwiKj2W9SNAMwnkhTxY2oHc5DHZKvV9x5SNlkMD_ggfN5RAN9r5w3G-Qz1rxJhQd-2JupyIKPvpFM-lotOV4VtqJo-cL7b5UuGiQgwaSkxbHKTWRUocr-W2CKmp-RvbFzj-FP57iR3-1Pbspbm9ZK7JCTtyHrmeE_bOSDrbiS-GxqgHG8uyOWE6uU06JJ_PlD_-Sl2bByQAkPxRoEC19-EWd04yTz25t773IU">
                    <div
                        class="absolute top-3 left-3 px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-lg uppercase tracking-tight">
                        ACTIVO</div>
                </div>
                <div class="p-5">
                    <div class="mb-4">
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">Salud de Publicación: 95%
                        </p>
                        <div class="w-full bg-gray-100 h-1.5 rounded-full">
                            <div class="bg-green-500 h-1.5 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-4">Residencial Valle Verde</h4>
                    <!-- TODO: Controlador necesario para la vista de Editar (edit route) -->
                    <button
                        class="w-full py-2 bg-slate-100 dark:bg-slate-800 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-bold hover:bg-slate-200 transition-colors">Editar
                        Detalles</button>
                </div>
            </div>

            <!-- Card 2: Rechazado -->
            <div
                class="bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-sm group">
                <div class="relative h-48">
                    <img alt="Terreno Seco"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGieMW-GIEslENzxfecAFim3djlyO6r8u7pQVqQeJTIbLqMqgdikL5Oteu-9xHuhpYwG42EXPKvD3iUusYQ_MpaZRdWVOsCykfbe6e2lI6k1cGKxe_mAxXphS1sLhnIEJrwglSMLSwZmb0PkMPkjsq41Wvu8VKCInjKaiJfJtDEmGXBIi-seK-CFZ709e61MGZkZKdlPtoBUnUmO37gidauR2k7e_hsTjtMNniWci_tk9ncs1shOqEvMP45-gITRaaxSg3LqWCh_g">
                    <div
                        class="absolute top-3 left-3 px-3 py-1 bg-error/10 text-error text-xs font-bold rounded-lg uppercase tracking-tight">
                        RECHAZADO</div>
                </div>
                <div class="p-5">
                    <div class="bg-error/5 border border-error/20 rounded-lg p-3 mb-4">
                        <p class="text-xs text-error font-bold flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">warning</span> Falta Validar Predial
                        </p>
                    </div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-4">Lote Panorámico Sur</h4>
                    <button
                        class="w-full py-2 bg-error text-white rounded-lg text-sm font-bold hover:bg-red-700 transition-colors">Ver
                        Motivo Rechazo</button>
                </div>
            </div>

            <!-- Card 3: Pendiente -->
            <div
                class="bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-sm group">
                <div class="relative h-48">
                    <img alt="Macrolote Industrial"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_4_NtC5I99rA9N2AbZGfCNaSwJpam2LGywQfuZYVCdojoDhkMNRzvZEw7cTrhxDYkxp13QriOf5Hyn7eeL3zAqKEqgU6OX485VBQdIoNvPnOgtBL-15JfntGAhQeLj9JDKlJKXFeMxFiZqtJatuQ9UH_ib6Pti9X0Y7jqV9YGUygcJmzqPuqSuBhBwTTRyn3ZDRXAMNXYCmWb0FeJqWCbjG2vix9AhpM0ikP1FCEOoowCXUZDLPle7yMNdHmYS4WOaEQnHEtJApM">
                    <div
                        class="absolute top-3 left-3 px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-lg uppercase tracking-tight">
                        PENDIENTE REVISIÓN</div>
                </div>
                <div class="p-5">
                    <p class="text-sm text-gray-500 mb-2">ID: #MZ-89021</p>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-4">Macrolote Industrial</h4>
                    <button
                        class="w-full py-2 bg-slate-100 dark:bg-slate-800 text-gray-400 rounded-lg text-sm font-bold cursor-not-allowed">Esperando
                        Aprobación</button>
                </div>
            </div>

            <!-- Card 4: Apartado -->
            <div
                class="bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-800 shadow-sm group">
                <div class="relative h-48">
                    <img alt="Vista Montaña"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBC9Sm7lKE9Mn0y6SCgNCWYhjUj9bNxarS-Ea3QKeeyAjStasYdqIm540ibQo0Z_4xJVqXhhIS3ifuvxxSnjbBLHCDmAKvH0WE0Q3ofou5LHZCvQPKik5RpXhzYlLeOrIadlixWfHgYYw85HD8xyJknhfAIj5R-nzXWfLnp-y20OBfwcL2bEHPC8xANnzS6DEA5HIC1vQyUrDB9dWlIa7zR_xhOlN6WMp3ZwcJTFmFIq8tFxhsFiIwKCrZrIwPSuc3e5ocqcH2i5HQ">
                    <div
                        class="absolute top-3 left-3 px-3 py-1 bg-tertiary-container text-white text-xs font-bold rounded-lg uppercase tracking-tight">
                        APARTADO</div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-xs font-bold">LC
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-900 dark:text-white">Luis Castillo</p>
                            <p class="text-[10px] text-tertiary font-bold flex items-center gap-1">
                                <span class="material-symbols-outlined text-[12px]">schedule</span> Expira en 36h
                            </p>
                        </div>
                    </div>
                    <h4 class="font-bold text-gray-900 dark:text-white mb-4">Vista Montaña Lote 4</h4>
                    <!-- TODO: Controlador necesario para ver los datos del comprador que apartó el terreno -->
                    <button
                        class="w-full py-2 bg-tertiary-container text-white rounded-lg text-sm font-bold hover:opacity-90 transition-colors">Datos
                        Comprador</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Identity Documentation Section -->
    <!-- TODO: Controlador necesario para recuperar y actualizar el estatus de los documentos y POST para subir uno nuevo -->
    <div class="mb-8">
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Documentación de Identidad</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">badge</span>
                </div>
                <div class="flex-1">
                    <h5 class="font-bold text-gray-900 dark:text-white">INE</h5>
                    <span class="text-xs text-gray-500 font-bold uppercase">No Contemplado</span>
                </div>
                <span class="material-symbols-outlined text-gray-400">help</span>
            </div>

            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 flex items-center gap-4">
                <div class="w-12 h-12 {{ $hasRfc ? 'bg-green-50 text-green-700' : 'bg-red-50 text-error' }} rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">description</span>
                </div>
                <div class="flex-1">
                    <h5 class="font-bold text-gray-900 dark:text-white">RFC</h5>
                    @if($hasRfc)
                        <span class="text-xs text-green-600 font-bold uppercase">Validado</span>
                    @else
                        <span class="text-xs text-error font-bold uppercase">Pendiente</span>
                    @endif
                </div>
                @if($hasRfc)
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                @else
                    <button class="bg-primary-container text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-primary transition-colors">Subir Ahora</button>
                @endif
            </div>

            <div
                class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 flex items-center gap-4">
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home_pin</span>
                </div>
                <div class="flex-1">
                    <h5 class="font-bold text-gray-900 dark:text-white">Comprobante Domicilio</h5>
                    <span class="text-xs text-gray-500 font-bold uppercase">No Contemplado</span>
                </div>
                <span class="material-symbols-outlined text-gray-400">help</span>
            </div>
        </div>
    </div>
@endsection