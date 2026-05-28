@extends('layouts.vendedor')

@section('title', 'Gestión de Leads - MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Title Section -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 border-gray-900 tracking-tight">Gestión de Leads y Conversión</h1>
            <p class="text-gray-500 text-sm mt-1">Supervisa el rendimiento de tus publicaciones y el contacto con clientes potenciales.</p>
        </div>
    </div>

    <!-- Alert Notifications -->
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

    <!-- Metrics Globales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <!-- Metric 1: Vistas Totales -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-green-700">
                    <span class="material-symbols-outlined">visibility</span>
                </div>
            </div>
            <p class="text-gray-500 text-sm font-medium">Vistas Totales</p>
            <h2 class="text-3xl font-bold text-gray-900">{{ number_format($totalVistas) }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Visitas a tus terrenos</p>
        </div>

        <!-- Metric 2: Consultas Recibidas -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center text-blue-600">
                    <span class="material-symbols-outlined">forum</span>
                </div>
            </div>
            <p class="text-gray-500 text-sm font-medium">Leads Totales</p>
            <h2 class="text-3xl font-bold text-gray-900">{{ $leads->count() }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Contactos generados a la fecha</p>
        </div>

        <!-- Metric 3: Reservaciones / Apartados -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600">
                    <span class="material-symbols-outlined">payments</span>
                </div>
            </div>
            <p class="text-gray-500 text-sm font-medium">Intenciones de Apartado</p>
            <h2 class="text-3xl font-bold text-gray-900">{{ $apartadosIntenciones }}</h2>
            <p class="text-[10px] text-gray-400 mt-1">Terrenos apartados listos para pago</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8">
        <!-- Listado de Leads -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-slate-50">
                    <h3 class="font-semibold text-gray-900">Leads Recientes</h3>
                    <span class="text-xs text-gray-400 font-semibold">Total: {{ $leads->count() }}</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gray-50/50 text-[11px] uppercase tracking-wider text-gray-400 border-b border-gray-100">
                                <th class="px-6 py-3 font-medium">Lead</th>
                                <th class="px-6 py-3 font-medium">Propiedad</th>
                                <th class="px-6 py-3 font-medium">Estado</th>
                                <th class="px-6 py-3 font-medium">Fecha</th>
                                <th class="px-6 py-3 font-medium text-right">Contacto</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($leads as $lead)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <!-- Lead Identity -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold text-xs">
                                                {{ strtoupper(substr($lead->nombre, 0, 2)) }}
                                            </div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900">{{ $lead->nombre }}</div>
                                                <div class="text-xs text-gray-400">{{ $lead->email }}</div>
                                                @if($lead->telefono)
                                                    <div class="text-[10px] text-gray-400">{{ $lead->telefono }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Associated Terrain -->
                                    <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                        {{ $lead->terreno->nombre ?? 'Terreno Desconocido' }}
                                    </td>

                                    <!-- Lead Status Inline Form -->
                                    <td class="px-6 py-4">
                                        <form action="{{ route('vendedor.leads.update', $lead->idLead) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <select name="estado" onchange="this.form.submit()" class="text-xs border border-gray-200 bg-white rounded-lg font-bold py-1 px-2.5 cursor-pointer focus:ring-1 focus:ring-primary focus:border-primary text-gray-700">
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
                                               class="inline-flex items-center gap-1 bg-primary text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-green-700 transition-colors shadow-sm">
                                                <span class="material-symbols-outlined text-xs">chat</span> WhatsApp
                                            </a>
                                        @else
                                            <a href="mailto:{{ $lead->email }}?subject=Informaci%C3%B3n%20sobre%20terreno%20{{ urlencode($lead->terreno->nombre ?? '') }}"
                                               class="inline-flex items-center gap-1 bg-primary text-white px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-green-700 transition-colors shadow-sm">
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
    </div>
</div>
@endsection