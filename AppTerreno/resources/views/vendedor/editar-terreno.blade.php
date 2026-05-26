@extends('layouts.vendedor')

@section('title', 'Editar Terreno | AppTerreno')

@section('content')
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

<form action="{{ route('vendedor.terrenos.update', $terreno->idTerreno) }}" method="POST">
@csrf
@method('PUT')

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Column: Presentational -->
    <div class="lg:col-span-4">
        <h2 class="text-3xl font-black text-green-700 dark:text-green-400 mb-4">Editar Terreno</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
            Mantenga la información de su propiedad actualizada para garantizar el máximo interés. Los cambios en el precio o las dimensiones se reflejarán de inmediato en el catálogo de clientes.
        </p>
        
        <!-- Showcase Image -->
        <div class="h-96 bg-gray-200 dark:bg-slate-800 rounded-xl flex items-end p-6 relative overflow-hidden">
            @if($terreno->imagenPrincipal)
                <img src="{{ $terreno->imagenPrincipal }}" alt="{{ $terreno->nombre }}" class="absolute inset-0 w-full h-full object-cover">
            @else
                <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-400 bg-slate-100 dark:bg-slate-800">
                    <span class="material-symbols-outlined text-5xl">landscape</span>
                    <span class="text-sm font-semibold mt-1">Sin imagen</span>
                </div>
            @endif
            <div class="relative z-10 w-full bg-gradient-to-t from-gray-900/80 to-transparent -mx-6 -mb-6 p-6 pt-12">
                <span class="text-green-400 text-xs font-bold tracking-wider uppercase drop-shadow-md">ESTADO DE PUBLICACIÓN</span>
                <p class="text-white text-xl font-medium mt-1 drop-shadow-lg leading-snug">
                    {{ $terreno->estado }}
                </p>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Form -->
    <div class="lg:col-span-8 flex flex-col gap-6">
        
        <!-- Section 1: Información Básica -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl p-8 shadow-sm border border-gray-200 dark:border-gray-800">
            <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 flex items-center justify-center text-sm font-bold">1</div>
                Información Básica
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Título del Listado</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $terreno->nombre) }}" placeholder="Ej: Terreno Sustentable en Valle Verde" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Descripción Detallada</label>
                    <textarea name="descripcion" rows="4" placeholder="Describa el potencial..." class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>{{ old('descripcion', $terreno->descripcion) }}</textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Precio (MXN)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
                            <input type="number" step="0.01" name="precio" value="{{ old('precio', $terreno->precio) }}" placeholder="0.00" class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Ubicación</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">location_on</span>
                            <input type="text" name="ubicacion" value="{{ old('ubicacion', $terreno->ubicacion) }}" placeholder="Colonia, Calle, Ciudad" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Detalles Técnicos -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl p-8 shadow-sm border border-gray-200 dark:border-gray-800">
            <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 flex items-center justify-center text-sm font-bold">2</div>
                Detalles Técnicos
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Largo (m)</label>
                    <input type="number" step="0.01" name="largo" value="{{ old('largo', $terreno->largo) }}" placeholder="Largo en metros" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Ancho (m)</label>
                    <input type="number" step="0.01" name="ancho" value="{{ old('ancho', $terreno->ancho) }}" placeholder="Ancho en metros" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Zonificación</label>
                    <div class="relative">
                        <select name="zonificacion" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="">Seleccionar...</option>
                            <option value="Residencial" {{ old('zonificacion', $terreno->zonificacion) === 'Residencial' ? 'selected' : '' }}>Residencial</option>
                            <option value="Comercial" {{ old('zonificacion', $terreno->zonificacion) === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            <option value="Industrial" {{ old('zonificacion', $terreno->zonificacion) === 'Industrial' ? 'selected' : '' }}>Industrial</option>
                            <option value="Agricola" {{ old('zonificacion', $terreno->zonificacion) === 'Agricola' ? 'selected' : '' }}>Agrícola</option>
                            <option value="Mixta" {{ old('zonificacion', $terreno->zonificacion) === 'Mixta' ? 'selected' : '' }}>Mixta</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Pendiente</label>
                    <div class="relative">
                        <select name="pendiente" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="">Seleccionar...</option>
                            <option value="Plana" {{ old('pendiente', $terreno->pendiente) === 'Plana' ? 'selected' : '' }}>Plana</option>
                            <option value="Semi-plana" {{ old('pendiente', $terreno->pendiente) === 'Semi-plana' ? 'selected' : '' }}>Semi-plana</option>
                            <option value="Con pendiente" {{ old('pendiente', $terreno->pendiente) === 'Con pendiente' ? 'selected' : '' }}>Con pendiente</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-4 mt-4">
            <button type="button" onclick="confirmDelete()" class="py-3 px-6 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors flex items-center justify-center gap-2 shadow-sm text-sm">
                <span class="material-symbols-outlined text-sm">delete</span>
                Eliminar Terreno
            </button>
            
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('vendedor.terrenos.index') }}" class="py-3 px-6 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-center font-bold rounded-lg hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors text-sm">
                    Cancelar
                </a>
                <button type="submit" class="py-3 px-6 bg-green-700 hover:bg-green-800 text-white font-bold rounded-lg transition-colors shadow-sm text-sm">
                    Guardar Cambios
                </button>
            </div>
        </div>

    </div>
</div>
</form>

<!-- Secondary Hidden Form for DELETE -->
<form id="delete-form" action="{{ route('vendedor.terrenos.destroy', $terreno->idTerreno) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
    function confirmDelete() {
        if (confirm('¿Estás seguro de que deseas eliminar este terreno de forma permanente? Esta acción no se puede deshacer y eliminará también los archivos de imagen guardados.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endsection
