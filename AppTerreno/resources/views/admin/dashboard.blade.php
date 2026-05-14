@extends('layouts.app')

@section('title', 'Dashboard Admin - MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Panel de Administración</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Total Usuarios</h3>
            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Usuario::count() }}</p>
        </div>
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Vendedores</h3>
            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Usuario::where('tipoUsuario', 'vendedor')->count() }}</p>
        </div>
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Clientes</h3>
            <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Usuario::where('tipoUsuario', 'cliente')->count() }}</p>
        </div>
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Terrenos</h3>
            <p class="text-3xl font-bold text-orange-600">{{ \App\Models\Terreno::count() }}</p>
        </div>
    </div>
</div>
@endsection