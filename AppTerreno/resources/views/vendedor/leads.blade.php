@extends('layouts.vendedor')

@section('title', 'Gestión de Leads - MAZ TERRENOS')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Title Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 border-gray-900 dark:text-white tracking-tight">Gestión de Leads y
                Conversión</h1>
            <p class="text-gray-500 text-sm mt-1">Supervisa el rendimiento de tus publicaciones y el contacto con clientes
                potenciales.</p>
        </div>

        <!-- Metrics Globales -->
        {{-- TODO_BACKEND (MERGE): Las estadísticas base como Vistas Totales, Consultas y Apartados deben ser calculadas en
        el controlador según los leads asociados a los terrenos del vendedor. --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-green-50 dark:bg-green-900/20 rounded-lg flex items-center justify-center text-green-700 dark:text-green-400">
                        <span class="material-symbols-outlined">visibility</span>
                    </div>
                    <span
                        class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+12%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium">Vistas Totales</p>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">12,480</h2>
                <p class="text-[10px] text-gray-400 mt-1">Clicks en tus terrenos este mes</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-center text-blue-600 dark:text-blue-400">
                        <span class="material-symbols-outlined">forum</span>
                    </div>
                    <span
                        class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+8%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium">Consultas vía WhatsApp</p>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">456</h2>
                <p class="text-[10px] text-gray-400 mt-1">Contactos directos generados</p>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 rounded-lg flex items-center justify-center text-amber-600 dark:text-amber-400">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <span
                        class="text-green-600 text-xs font-bold bg-green-50 dark:bg-green-900/40 px-2 py-1 rounded-full">+15%</span>
                </div>
                <p class="text-gray-500 text-sm font-medium">Intenciones de Apartado</p>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">24</h2>
                <p class="text-[10px] text-gray-400 mt-1">Clientes listos para reservar</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Listado de Leads -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-slate-900 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-800 flex justify-between items-center">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Leads Recientes</h3>
                        <button class="text-green-700 dark:text-green-400 text-xs font-semibold hover:underline">Ver
                            todos</button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr
                                    class="bg-gray-50/50 dark:bg-slate-800/50 text-[11px] uppercase tracking-wider text-gray-400">
                                    <th class="px-6 py-3 font-medium">Lead</th>
                                    <th class="px-6 py-3 font-medium">Propiedad</th>
                                    <th class="px-6 py-3 font-medium">Acción</th>
                                    <th class="px-6 py-3 font-medium">Fecha</th>
                                    <th class="px-6 py-3 font-medium text-right">Contacto</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                {{-- TODO_BACKEND (MERGE): Aplicar foreach ($leads as $lead) aquí para iterar los leads
                                guardados en BD. Ej: $lead->nombre, $lead->propiedad->titulo, $lead->fecha --}}
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-700 dark:text-green-400 font-bold text-xs">
                                                RM</div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900 dark:text-white">Ricardo Mendoza
                                                </div>
                                                <div class="text-xs text-gray-400">r.mendoza@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">Lote Vista Hermosa #42
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-400 text-[10px] font-bold">
                                            <span class="material-symbols-outlined text-[12px]"
                                                style="font-variation-settings: 'FILL' 1;">payments</span> APARTADO
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400">Hoy, 10:45 AM</td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="bg-[#228b22] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:opacity-90 transition-colors shadow-sm">Contactar</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 font-bold text-xs">
                                                SG</div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900 dark:text-white">Sofía García</div>
                                                <div class="text-xs text-gray-400">+52 555-0192</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">Residencial Los Olivos
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400 text-[10px] font-bold">
                                            <span class="material-symbols-outlined text-[12px]">forum</span> WHATSAPP
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400">Hoy, 08:20 AM</td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="bg-[#228b22] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:opacity-90 transition-colors shadow-sm">Contactar</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300 font-bold text-xs">
                                                AL</div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900 dark:text-white">Andrés López</div>
                                                <div class="text-xs text-gray-400">a.lopez@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">Terreno Industrial Km 12
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 text-[10px] font-bold">
                                            <span class="material-symbols-outlined text-[12px]">visibility</span> CLICK
                                            TERRENO
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400">Ayer, 06:15 PM</td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="bg-[#228b22] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:opacity-90 transition-colors shadow-sm">Contactar</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-700 dark:text-green-400 font-bold text-xs">
                                                CD</div>
                                            <div class="text-sm">
                                                <div class="font-semibold text-gray-900 dark:text-white">Carla Díaz</div>
                                                <div class="text-xs text-gray-400">+52 333-8821</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">Lote Vista Hermosa #45
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400 text-[10px] font-bold">
                                            <span class="material-symbols-outlined text-[12px]">forum</span> WHATSAPP
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-400">Ayer, 02:40 PM</td>
                                    <td class="px-6 py-4 text-right">
                                        <button
                                            class="bg-[#228b22] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:opacity-90 transition-colors shadow-sm">Contactar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Gráfico de Conversión (Panel Lateral) -->
            <div class="lg:col-span-1">
                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-xl border border-gray-200 dark:border-gray-800 shadow-sm h-full">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-green-700 dark:text-green-400">filter_alt</span>
                        Embudo de Conversión
                    </h3>
                    {{-- TODO_BACKEND (MERGE): Las métricas del embudo deben ser devueltas y formateadas por el controlador.
                    --}}
                    <div class="space-y-6">
                        <!-- Step 1 -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">Vistas (Top)</span>
                                <span class="text-sm font-black text-gray-900 dark:text-white">12,480</span>
                            </div>
                            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden">
                                <div class="bg-green-700 dark:bg-green-600 h-full w-full opacity-30 flex items-center px-4">
                                </div>
                            </div>
                        </div>
                        <!-- Transition Arrow -->
                        <div class="flex justify-center -my-2 text-gray-300 dark:text-gray-600">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                        <!-- Step 2 -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">WhatsApp (Middle)</span>
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-black text-gray-900 dark:text-white">456</span>
                                    <span class="text-[10px] text-green-600 dark:text-green-400 font-bold">3.6% conv.</span>
                                </div>
                            </div>
                            <div
                                class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden flex justify-center">
                                <div class="bg-green-700 dark:bg-green-600 h-full w-2/3 opacity-60"></div>
                            </div>
                        </div>
                        <!-- Transition Arrow -->
                        <div class="flex justify-center -my-2 text-gray-300 dark:text-gray-600">
                            <span class="material-symbols-outlined">expand_more</span>
                        </div>
                        <!-- Step 3 -->
                        <div class="relative">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs font-bold text-gray-500">Apartados (Bottom)</span>
                                <div class="flex flex-col items-end">
                                    <span class="text-sm font-black text-gray-900 dark:text-white">24</span>
                                    <span class="text-[10px] text-green-600 dark:text-green-400 font-bold">5.2% conv.</span>
                                </div>
                            </div>
                            <div
                                class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-8 overflow-hidden flex justify-center">
                                <div class="bg-green-700 dark:bg-green-600 h-full w-1/3 opacity-100"></div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100 dark:border-gray-800">
                            <div
                                class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-100 dark:border-green-900/40">
                                <p class="text-[11px] text-green-800 dark:text-green-300 font-medium leading-relaxed">
                                    <span class="font-bold">Insight:</span> Tu tasa de conversión de WhatsApp a Apartado ha
                                    subido un 2% este mes. Mantén el tiempo de respuesta bajo para seguir mejorando.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection