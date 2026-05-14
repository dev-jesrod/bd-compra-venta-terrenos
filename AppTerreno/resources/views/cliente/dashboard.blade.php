@extends('layouts.app')

@section('title', 'Dashboard Cliente - MAZ TERRENOS')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Bienvenido a tu Dashboard, {{ auth()->user()->nombre }}</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Terrenos Favoritos</h3>
            <p class="text-3xl font-bold text-green-600">0</p>
        </div>
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Consultas Realizadas</h3>
            <p class="text-3xl font-bold text-blue-600">0</p>
        </div>
        
        <div class="bg-white dark:bg-slate-900 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Terrenos Apartados</h3>
            <p class="text-3xl font-bold text-purple-600">0</p>
        </div>
    </div>
</div>
@endsection