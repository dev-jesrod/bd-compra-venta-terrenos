@extends('layouts.vendedor')

@section('title', 'Gestión de Leads - MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Title Section -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 border-gray-900 dark:text-white tracking-tight">Gestión de Leads y Conversión</h1>
            <p class="text-gray-500 text-sm mt-1">Supervisa el rendimiento de tus publicaciones y el contacto con clientes potenciales.</p>
        </div>
    </div>

    <!-- Alert Notifications -->
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

    <!-- Metrics Globales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Metric 1: Vistas Totales -->
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-50 dark:bg-green-900/20 rounded-lg flex items-center justify-center text-green-700 dark:text-green-400">
                    <span class="material-symbols-outlined">visibility</span>
                </div>
                <span class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+12%</span>
            </div>
            <p class="text-gray-500 text-sm font-medium">Vistas Totales (Simulado)</p>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalVistas) }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Clicks en tus terrenos este mes</p>
        </div>

        <!-- Metric 2: Consultas Recibidas -->
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-center text-blue-600 dark:text-blue-400">
                    <span class="material-symbols-outlined">forum</span>
                </div>
                <span class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+8%</span>
            </div>
            <p class="text-gray-500 text-sm font-medium">Leads Totales</p>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $leads->count() }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Contactos generados a la fecha</p>
        </div>

        <!-- Metric 3: Reservaciones / Apartados -->
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 rounded-lg flex items-center justify-center text-amber-600 dark:text-amber-400">
                    <span class="material-symbols-outlined">payments</span>
                </div>
                <span class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+15%</span>
            </div>
            <p class="text-gray-500 text-sm font-medium">Intenciones de Apartado</p>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $apartadosIntenciones }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Terrenos apartados listos para pago</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Listado de Leads -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex justify-between items-center bg-slate-50 dark:bg-slate-900/50">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Leads Recientes</h3>
                    <span class="text-xs text-gray-400 font-semibold">Total: {{ $leads->count() }}</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50 dark:bg-slate-800/50 text-[11px] uppercase tracking-wider text-gray-400 border-b border-gray-100 dark:border-gray-800">
                                <th class="px-6 py-3 font-medium">Lead</th>
                                <th class="px-6 py-3 font-medium">Propiedad</th>
                                <th class="px-6 py-3 font-medium">Estado</th>
                                <th class="px-6 py-3 font-medium">Fecha</th>
                                <th class="px-6 py-3 font-medium text-right">Contacto</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @forelse ($leads as $lead)
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <!-- Lead Identity -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-700 dark:text-green-400 font-bold text-xs">
                                                {{ strtoupper(substr($lead->nombre, 0, 2)) }}
                                            </div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900 dark:text-white">{{ $lead->nombre }}</div>
                                                <div class="text-xs text-gray-400">{{ $lead->email }}</div>
                                                @if($lead->telefono)
                                                    <div class="text-[10px] text-gray-400">{{ $lead->telefono }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Associated Terrain -->
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 font-medium">
                                        {{ $lead->terreno->nombre ?? 'Terreno Desconocido' }}
                                    </td>

                                    <!-- Lead Status Inline Form -->
                                    <td class="px-6 py-4">
                                        <form action="{{ route('vendedor.leads.update', $lead->idLead) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <select name="estado" onchange="this.form.submit()" class="text-xs border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 rounded-lg font-bold py-1 px-2.5 cursor-pointer focus:ring-1 focus:ring-primary focus:border-primary text-gray-700 dark:text-gray-300">
                                                <option value="NUEVO" class="text-amber-600 font-bold" {{ $lead->estado === 'NUEVO' ? 'selected' : '' }}>Nuevo</option>
                                                <option value="CONTACTADO" class="text-blue-600 font-bold" {{ $lead->estado === 'CONTACTADO' ? 'selected' : '' }}>Contactado</option>
                                                <option value="DESCARTADO" class="text-slate-500 font-bold" {{ $lead->estado === 'DESCARTADO' ? 'selected' : '' }}>Descartado</option>
                                            </select>
                                        </form>
                                    </td>

                                    <!-- Date Created -->
                                    <td class="px-6 py-4 text-xs text-gray-400 font-medium">
                                        {{ $lead->created_at->diffForHumans() }}
                                    </td>

                                    <!-- Direct Contact Buttons -->
                                    <td class="px-6 py-4 text-right">
                                        @if($lead->telefono)
                                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $lead->telefono) }}?text=Hola%20{{ urlencode($lead->nombre) }},%20te%20contacto%20desde%20MAZ%20TERRENOS%20sobre%20el%20terreno%20'{{ urlencode($lead->terreno->nombre ?? '') }}'." 
                                               target="_blank"
                                               class="inline-flex items-center gap-1 bg-[#228b22] text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-green-700 transition-colors shadow-sm">
                                                <span class="material-symbols-outlined text-xs">chat</span> WhatsApp
                                            </a>
                                        @else
                                            <a href="mailto:{{ $lead->email }}?subject=Informaci%C3%B3n%20sobre%20terreno%20{{ urlencode($lead->terreno->nombre ?? '') }}"
                                               class="inline-flex items-center gap-1 bg-slate-900 text-white dark:bg-slate-800 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-slate-800 dark:hover:bg-slate-700 transition-colors shadow-sm">
                                                <span class="material-symbols-outlined text-xs">mail</span> Enviar Correo
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                        <span class="material-symbols-outlined text-4xl mb-2">forum</span>
                                        <p class="text-sm font-bold text-gray-500">No has recibido leads aún</p>
                                        <p class="text-xs text-gray-400 max-w-xs mx-auto mt-1">Los clientes interesados en tus terrenos publicados aparecerán aquí automáticamente.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Gráfico de Conversión (Panel Lateral) -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm h-full flex flex-col justify-between">
                <div>
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-green-700 dark:text-green-400">filter_alt</span>
                        Embudo de Conversión
                    </h3>
                    
                    <div class="space-y-6">
                        <!-- Step 1: Vistas -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">Vistas (Top)</span>
                                <span class="text-sm font-black text-gray-900 dark:text-white">{{ number_format($totalVistas) }}</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden relative">
                                <div class="bg-green-700 dark:bg-green-600 h-full w-full opacity-20 absolute inset-0"></div>
                                <div class="absolute inset-0 flex items-center px-4 text-xs font-bold text-green-800 dark:text-green-300">100% de Alcance</div>
                            </div>
                        </div>

                        <!-- Transition Arrow -->
                        <div class="flex justify-center -my-2 text-gray-300 dark:text-gray-600">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>

                        <!-- Step 2: Leads -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">Leads Generados</span>
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-black text-gray-900 dark:text-white">{{ $leads->count() }}</span>
                                    <span class="text-[10px] text-green-600 dark:text-green-400 font-bold">{{ $whatsappConvRate }}% conversión</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden relative">
                                <div class="bg-green-700 dark:bg-green-600 h-full opacity-50 absolute left-0 top-0" style="width: {{ min(100, max(5, $whatsappConvRate * 2)) }}%"></div>
                                <div class="absolute inset-0 flex items-center px-4 text-xs font-bold text-green-900 dark:text-green-200">Interés Directo</div>
                            </div>
                        </div>

                        <!-- Transition Arrow -->
                        <div class="flex justify-center -my-2 text-gray-300 dark:text-gray-600">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>

                        <!-- Step 3: Reservas / Apartados -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">Apartados Realizados</span>
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-black text-gray-900 dark:text-white">{{ $apartadosIntenciones }}</span>
                                    <span class="text-[10px] text-green-600 dark:text-green-400 font-bold">{{ $apartadoConvRate }}% conversión</span>
                                </div>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden relative">
                                <div class="bg-green-700 dark:bg-green-600 h-full opacity-100 absolute left-0 top-0" style="width: {{ min(100, max(5, $apartadoConvRate * 5)) }}%"></div>
                                <div class="absolute inset-0 flex items-center px-4 text-xs font-bold text-white">Intención de Pago</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-800">
                    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-100 dark:border-green-900/40">
                        <p class="text-[11px] text-green-800 dark:text-green-300 font-medium leading-relaxed flex gap-1 items-start">
                            <span class="material-symbols-outlined text-sm flex-shrink-0" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
                            <span><span class="font-bold">Consejo:</span> Tu tasa de conversión de Vistas a Leads es del <span class="font-bold">{{ $whatsappConvRate }}%</span>. ¡Asegúrate de responder rápidamente para maximizar las reservaciones!</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection