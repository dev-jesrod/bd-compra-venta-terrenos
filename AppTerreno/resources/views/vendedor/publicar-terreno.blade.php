@extends('layouts.vendedor')

@section('title', 'Publicar un Nuevo Terreno | AppTerreno')

@section('content')
<!-- TODO: Formulario apuntando a controlador necesario para guardar la publicación -->
<!-- <form action="{{-- route('vendedor.terrenos.store') --}}" method="POST" enctype="multipart/form-data"> -->
<!-- @csrf -->

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Column: Presentational -->
    <div class="lg:col-span-4">
        <h2 class="text-3xl font-black text-green-700 dark:text-green-400 mb-4">Publicar un Nuevo Terreno</h2>
        <p class="text-gray-600 dark:text-gray-400 mb-8 leading-relaxed">
            Transforme el paisaje en una oportunidad. Complete los detalles técnicos y de sostenibilidad para destacar su propiedad en nuestro catálogo exclusivo.
        </p>
        
        <!-- Motivational Image Placeholder -->
        <div class="h-96 bg-gray-300 dark:bg-gray-700 rounded-xl flex items-end p-6 relative overflow-hidden">
            <!-- Imagen de motivacion placeholder -->
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-gray-500 font-bold text-xl uppercase tracking-widest opacity-60">Imagen de Motivación</span>
            </div>
            <!-- Overlay and Text -->
            <div class="relative z-10 w-full bg-gradient-to-t from-gray-900/80 to-transparent -mx-6 -mb-6 p-6 pt-12">
                <span class="text-gray-100 text-xs font-bold tracking-wider uppercase drop-shadow-md">COMPROMISO</span>
                <p class="text-white text-xl font-medium italic mt-1 drop-shadow-lg leading-snug">
                    "Preservar el mañana, construyendo hoy."
                </p>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Form -->
    <div class="lg:col-span-8 flex flex-col gap-6">
        
        <!-- Section 1: Información Básica -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 flex items-center justify-center text-sm font-bold">1</div>
                Información Básica
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Título del Listado</label>
                    <input type="text" name="titulo" placeholder="Ej: Terreno Sustentable en Valle Verde" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Descripción Detallada</label>
                    <textarea name="descripcion" rows="4" placeholder="Describa el potencial y la belleza natural de la zona..." class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors"></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Precio (MXN)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
                            <input type="number" step="0.01" name="precio" placeholder="0.00" class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Ubicación</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">location_on</span>
                            <input type="text" name="ubicacion" placeholder="Colonia, Calle." class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Detalles Técnicos -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 flex items-center justify-center text-sm font-bold">2</div>
                Detalles Técnicos
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Superficie (m²)</label>
                    <input type="number" name="superficie" placeholder="Total m2" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Zonificación</label>
                    <div class="relative">
                        <select name="zonificacion" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="residencial">Residencial</option>
                            <option value="comercial">Comercial</option>
                            <option value="mixto">Mixto</option>
                            <option value="agricola">Agrícola</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Pendiente</label>
                    <div class="relative">
                        <select name="pendiente" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="plano">Plano</option>
                            <option value="inclinado">Inclinado</option>
                            <option value="escarpado">Escarpado</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Galería de Imágenes -->
        <section class="bg-white dark:bg-slate-900 rounded-2xl p-8 shadow-sm border border-gray-100 dark:border-gray-800">
            <h3 class="text-xl font-bold text-green-700 dark:text-green-400 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-400 flex items-center justify-center text-sm font-bold">3</div>
                Galería de Imágenes
            </h3>
            
            <div class="border-2 border-dashed border-green-300 dark:border-green-700/50 rounded-xl p-10 flex flex-col items-center justify-center text-center hover:bg-green-50/50 dark:hover:bg-slate-800/50 transition-colors relative mb-6">
                <div class="w-12 h-12 rounded-full bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-[24px]">cloud_upload</span>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Arrastre y suelte sus archivos aquí</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Soporta JPG, PNG y WEBP hasta 10MB</p>
                <div class="relative">
                    <input type="file" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer text-0" title="Seleccionar Archivos">
                    <button type="button" class="px-6 py-2 border border-green-600 text-green-600 dark:border-green-500 dark:text-green-500 font-bold rounded-full hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors text-sm pointer-events-none">
                        Seleccionar Archivos
                    </button>
                </div>
            </div>

            <!-- Image Placeholders -->
            <div class="flex gap-4">
                <div class="w-32 h-32 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 transition-colors rounded-lg border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-gray-400 text-3xl">image</span>
                </div>
                <div class="w-32 h-32 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 transition-colors rounded-lg border border-gray-200 dark:border-gray-700 flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-gray-400 text-3xl">image</span>
                </div>
            </div>
        </section>

        <!-- Actions -->
        <div class="flex flex-col-reverse sm:flex-row justify-end items-center gap-4 mt-2">
            <!-- TODO: Controlador necesario para guardar estatus a borrador -->
            <button type="button" class="w-full sm:w-auto px-6 py-3 text-green-700 dark:text-green-400 font-bold hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition-colors">
                Guardar Borrador
            </button>
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-green-700 hover:bg-green-800 text-white font-bold rounded-lg transition-colors shadow-sm">
                Publicar Terreno
            </button>
        </div>

    </div>

</div>

<!-- </form> -->
@endsection
