@extends('layouts.vendedor')

@section('title', 'Mis Propiedades | MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Propiedades</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona y monitorea el rendimiento de tus terrenos publicados.</p>
        </div>
        <a href="{{ url('/vendedor/publicar-terreno') }}" class="flex items-center justify-center gap-2 bg-[#228b22] text-white px-6 py-3 rounded-lg font-bold hover:opacity-90 active:opacity-80 transition-all shadow-md">
            <span class="material-symbols-outlined" data-icon="add">add_circle</span>
            Publicar Nuevo Terreno
        </a>
    </div>

    <!-- Filter Bar -->
    {{-- TODO_BACKEND (MERGE): El controlador debe recibir parámetros de filtro (ej: ?status=activos) y retornar las propiedades filtradas, o utilizar un componente Livewire para filtros asíncronos. --}}
    <div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 p-2 mb-8 overflow-x-auto">
        <div class="flex items-center gap-2 min-w-max">
            <button class="px-5 py-2 rounded-lg bg-green-50 dark:bg-green-900/40 text-green-700 dark:text-green-400 font-semibold text-sm">Todos</button>
            <button class="px-5 py-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors text-sm font-medium">Activos</button>
            <button class="px-5 py-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors text-sm font-medium">En Revisión</button>
            <button class="px-5 py-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors text-sm font-medium">Rechazados</button>
            <button class="px-5 py-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors text-sm font-medium">Apartados</button>
        </div>
    </div>

    <!-- Property List -->
    {{-- TODO_BACKEND (MERGE): Reemplazar estos divs estáticos por una iteración. 
         Ejemplo: @forelse($propiedades as $propiedad) ... html de la tarjeta ... @empty <p>No hay propiedades</p> @endforelse --}}
    <div class="space-y-6">
        <!-- Card 1: Activo -->
        {{-- TODO_BACKEND: Sustituir la información de la tarjeta (imagen, título, precio, ubicación, status, vistas) con las variables del objeto modelo. --}}
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden flex flex-col lg:flex-row hover:shadow-md transition-shadow">
            <div class="relative lg:w-72 h-48 lg:h-auto overflow-hidden">
                <img class="w-full h-full object-cover" data-alt="aerial drone shot of a large green residential plot of land in a developing coastal neighborhood under bright morning sunlight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDnAs_6t3xrAlv6DhlwmxAoVu-dPgB6-BPmZXYIF3-Sq3jNaMrUo231xfOVInbjVjWTzM74-ORSx_WC2dZpjZ8n4l-UT8dSon6IP70UfX_Kg2WQ-MVYIcoad_wHd45Nm8on2DY7vQ1Tm0v2Sdg6kEqi0TSfCyweHGr_ZRTl1TyIfqN8x1xG-IYq8M9w8z9Y1MlUSE2OdQgFWvqrOeTJtRsmycI2ko7WTMfFLeWSbX0KiBmj3kMe_d2Z54ZZMYv40p7JDY4W02DAOug" />
                <div class="absolute top-4 left-4 bg-green-100 text-green-800 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md border border-green-200">
                    Activo
                </div>
            </div>
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Main Info -->
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">Lote Residencial Vista al Mar - Sector Norte</h3>
                        <div class="flex items-center text-gray-500 gap-1 text-sm">
                            <span class="material-symbols-outlined text-sm" data-icon="location_on">location_on</span>
                            Mazatlán, Zona Dorada
                        </div>
                        <div class="mt-4">
                            <span class="block text-2xl font-black text-green-700 dark:text-green-400">$1,450,000 MXN</span>
                            <span class="text-xs text-gray-400 font-medium">$3,625 / m²</span>
                        </div>
                    </div>
                    <!-- Metrics -->
                    <div class="flex flex-col justify-center space-y-4 px-0 md:px-6 md:border-x border-gray-50 dark:border-gray-800">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Vistas totales</span>
                            <span class="font-bold text-gray-900 dark:text-white">1,240</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Leads recibidos</span>
                            <span class="font-bold text-gray-900 dark:text-white">18</span>
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between items-center text-[11px] font-bold uppercase tracking-tight text-gray-400">
                                <span>Salud del Anuncio</span>
                                <span class="text-green-600 dark:text-green-400">Excelente</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full w-[92%]"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Actions -->
                    <div class="flex flex-col justify-center gap-2">
                        {{-- TODO_BACKEND: El botón de editar debe enlazar a la vista de edición correspondiente: href="{{ route('propiedades.edit', $propiedad->id) }}" --}}
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
                            Editar
                        </button>
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="insights">insights</span>
                            Estadísticas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Apartado -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden flex flex-col lg:flex-row hover:shadow-md transition-shadow">
            <div class="relative lg:w-72 h-48 lg:h-auto overflow-hidden">
                <img class="w-full h-full object-cover" data-alt="flat desert landscape land parcel with orange soil and mountain background at sunset with clear sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMEpUOGPAHNdPeCqeVfbAVJxFbtYBHZlu1jv-EV8qQ9EfL-iGZnfKBY8FpMlhA_Nz1UW_pR84z9EllB1DQKARxJ8CK9CLdX4bGZc1a5WVXIauvjQpNRGw7BrXtR0Xc8ptGj0UwDkxasDyhIR3ON_ZRTcGkhcZI9bLPR4FasmbXv18iJIIWO8R3Nk4cL8gJRnKfA1sMYCTtms_brkMl69Lh9D_C0s7NT3oHOZeNSQJDQuNuJGWKRWmxP6IoYTrgl1OjSGQE7d4qHWM" />
                <div class="absolute top-4 left-4 bg-blue-100 text-blue-800 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md border border-blue-200">
                    Apartado
                </div>
            </div>
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white leading-tight">Terreno Comercial Av. Principal</h3>
                        <div class="flex items-center text-gray-500 gap-1 text-sm">
                            <span class="material-symbols-outlined text-sm" data-icon="location_on">location_on</span>
                            Culiacán, Desarrollo Urbano
                        </div>
                        <div class="mt-4">
                            <span class="block text-2xl font-black text-blue-700 dark:text-blue-400">$2,890,000 MXN</span>
                            <span class="text-xs text-gray-400 font-medium">$5,780 / m²</span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center space-y-4 px-0 md:px-6 md:border-x border-gray-50 dark:border-gray-800">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Vistas totales</span>
                            <span class="font-bold text-gray-900 dark:text-white">856</span>
                        </div>
                        <div class="flex justify-between items-center text-sm text-blue-600 dark:text-blue-400 font-medium">
                            <span>Operación en curso</span>
                            <span class="material-symbols-outlined text-sm" data-icon="timer">timer</span>
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between items-center text-[11px] font-bold uppercase tracking-tight text-gray-400">
                                <span>Salud del Anuncio</span>
                                <span class="text-green-600 dark:text-green-400">80%</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full w-[80%]"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-2">
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
                            Editar
                        </button>
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-blue-50 dark:bg-blue-900/40 text-blue-700 dark:text-blue-400 font-bold text-sm hover:bg-blue-100 dark:hover:bg-blue-900/60 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="person">person</span>
                            Datos Comprador
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Rechazado -->
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden flex flex-col lg:flex-row hover:shadow-md transition-shadow grayscale-[0.5] opacity-90">
            <div class="relative lg:w-72 h-48 lg:h-auto overflow-hidden">
                <img class="w-full h-full object-cover" data-alt="unpaved plot of land with overgrown wild grass and a simple wooden fence under a cloudy sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBXvgSsj-p0E4rYXaeLqcQ9fvy9nYxYDxnp_el9etMgMq_YLLy6OPgVKMMzDQ7ifCfesQA6K3x0VtwZrqDA0ie-qhMsr84vFQ6yy0aA-ntDIFXCQEINCLQpLEZeEPpInZrg2Q7Vv0RtXiL1RQF1gpk9zd_skOcqMySWn9cf-TOdiPLNcEyi6BY-2kWHIacFKgaIcQHvlE2SctvZEJliZA6F-wjNk-dcwEKtlrpRdUTLZKIDlGkBbzGYocGgbrfjzKxucmgxrPryiY8" />
                <div class="absolute top-4 left-4 bg-red-100 text-red-800 text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md border border-red-200">
                    Rechazado
                </div>
            </div>
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-gray-400 leading-tight">Macrolote Industrial El Salto</h3>
                        <div class="flex items-center text-gray-400 gap-1 text-sm">
                            <span class="material-symbols-outlined text-sm" data-icon="location_on">location_on</span>
                            Mazatlán, Libramiento Sur
                        </div>
                        <div class="mt-4">
                            <span class="block text-2xl font-black text-gray-400">$8,500,000 MXN</span>
                            <span class="text-xs text-gray-400 font-medium">$1,200 / m²</span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center space-y-4 px-0 md:px-6 md:border-x border-gray-50 dark:border-gray-800">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400">Vistas totales</span>
                            <span class="font-bold text-gray-400">0</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400 text-xs italic">Publicación no visible</span>
                        </div>
                        <div class="space-y-1.5">
                            <div class="flex justify-between items-center text-[11px] font-bold uppercase tracking-tight text-red-400">
                                <span>Salud del Anuncio</span>
                                <span>Crítica</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full w-[15%]"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-2">
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold text-sm hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="edit">edit</span>
                            Corregir Anuncio
                        </button>
                        <button class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-red-50 dark:bg-red-900/40 text-red-700 dark:text-red-400 font-bold text-sm hover:bg-red-100 dark:hover:bg-red-900/60 transition-colors">
                            <span class="material-symbols-outlined text-lg" data-icon="report">report</span>
                            Ver Motivo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection