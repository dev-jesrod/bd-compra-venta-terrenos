@extends('layouts.vendedor')

@section('title', 'Publicar un Nuevo Terreno | AppTerreno')

@section('content')
<!-- Feedback Alerts -->
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

<form action="{{ route('vendedor.terrenos.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Column: Presentational -->
    <div class="lg:col-span-4">
        <h2 class="text-3xl font-black text-green-700 mb-4">Publicar un Nuevo Terreno</h2>
        <p class="text-gray-600 mb-8 leading-relaxed">
            Transforme el paisaje en una oportunidad. Complete los detalles técnicos y de sostenibilidad para destacar su propiedad en nuestro catálogo exclusivo.
        </p>
        
        <!-- Motivational Image Real -->
        <div class="h-96 rounded-xl flex items-end p-6 relative overflow-hidden bg-cover bg-center shadow-lg border border-gray-200" style="background-image: url('{{ asset('images/motivation_landscape.png') }}');">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent"></div>
            <div class="relative z-10 w-full">
                <span class="text-green-400 text-xs font-bold tracking-wider uppercase drop-shadow-md">COMPROMISO</span>
                <p class="text-white text-xl font-medium italic mt-1 drop-shadow-lg leading-snug">
                    "Preservar el mañana, construyendo hoy."
                </p>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Form -->
    <div class="lg:col-span-8 flex flex-col gap-6">
        
        <!-- Section 1: Información Básica -->
        <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <h3 class="text-xl font-bold text-green-700 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-sm font-bold">1</div>
                Información Básica
            </h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Título del Listado</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Terreno Sustentable en Valle Verde" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Descripción Detallada</label>
                    <textarea name="descripcion" rows="4" placeholder="Describa el potencial y la belleza natural de la zona..." class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Precio (MXN)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
                            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" placeholder="0.00" class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                        </div>
                        @error('precio')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Ubicación</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-[20px]">location_on</span>
                            <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Colonia, Calle, Ciudad" class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                        </div>
                        @error('ubicacion')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 2: Detalles Técnicos -->
        <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <h3 class="text-xl font-bold text-green-700 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-sm font-bold">2</div>
                Detalles Técnicos
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Largo (m)</label>
                    <input type="number" step="0.01" name="largo" value="{{ old('largo') }}" placeholder="Largo en metros" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                    @error('largo')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ancho (m)</label>
                    <input type="number" step="0.01" name="ancho" value="{{ old('ancho') }}" placeholder="Ancho en metros" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors" required>
                    @error('ancho')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <p class="text-xs text-slate-500 mt-2 font-medium italic flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">info</span>
                La superficie se calculará automáticamente (Largo × Ancho) al publicar.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Zonificación</label>
                    <div class="relative">
                        <select name="zonificacion" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="">Seleccionar...</option>
                            <option value="Residencial" {{ old('zonificacion') === 'Residencial' ? 'selected' : '' }}>Residencial</option>
                            <option value="Comercial" {{ old('zonificacion') === 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            <option value="Industrial" {{ old('zonificacion') === 'Industrial' ? 'selected' : '' }}>Industrial</option>
                            <option value="Agricola" {{ old('zonificacion') === 'Agricola' ? 'selected' : '' }}>Agrícola</option>
                            <option value="Mixta" {{ old('zonificacion') === 'Mixta' ? 'selected' : '' }}>Mixta</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                    @error('zonificacion')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pendiente</label>
                    <div class="relative">
                        <select name="pendiente" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors appearance-none">
                            <option value="">Seleccionar...</option>
                            <option value="Plana" {{ old('pendiente') === 'Plana' ? 'selected' : '' }}>Plana</option>
                            <option value="Semi-plana" {{ old('pendiente') === 'Semi-plana' ? 'selected' : '' }}>Semi-plana</option>
                            <option value="Con pendiente" {{ old('pendiente') === 'Con pendiente' ? 'selected' : '' }}>Con pendiente</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                    </div>
                    @error('pendiente')
                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>

        <!-- Section 3: Galería de Imágenes -->
        <section class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
            <h3 class="text-xl font-bold text-green-700 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-green-100 text-green-700 flex items-center justify-center text-sm font-bold">3</div>
                Galería de Imágenes
                <span class="text-xs font-normal text-gray-500 ml-2" id="uploader-count">(Máximo 5 imágenes, 500KB cada una)</span>
            </h3>
            
            <div class="border-2 border-dashed border-green-300 rounded-xl p-10 flex flex-col items-center justify-center text-center hover:bg-green-50/50 transition-colors relative mb-6">
                <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-4">
                    <span class="material-symbols-outlined text-[24px]">cloud_upload</span>
                </div>
                <h4 class="font-bold text-gray-900 mb-1">Arrastre y suelte sus archivos aquí</h4>
                <p class="text-sm text-gray-500 mb-4">Soporta JPG, PNG y WEBP hasta 500KB</p>
                <div class="relative">
                    <input type="file" id="imagenes-input" name="imagenes[]" multiple accept="image/jpeg,image/jpg,image/png,image/webp" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer text-[0px]" title="Seleccionar Archivos">
                    <button type="button" class="px-6 py-2 border border-green-600 text-green-600 font-bold rounded-full hover:bg-green-50 transition-colors text-sm pointer-events-none">
                        Seleccionar Archivos
                    </button>
                </div>
            </div>

            <!-- Preview Container -->
            <div id="image-previews" class="grid grid-cols-2 sm:grid-cols-5 gap-4"></div>
            @error('imagenes')
                <p class="text-red-500 text-xs mt-2 font-semibold">{{ $message }}</p>
            @enderror
        </section>

        <!-- Actions -->
        <div class="flex justify-end items-center gap-4 mt-2">
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-green-700 hover:bg-green-800 text-white font-bold rounded-lg transition-colors shadow-sm">
                Publicar Terreno
            </button>
        </div>

    </div>

</div>

</form>

<script>
    document.getElementById('imagenes-input').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('image-previews');
        const countIndicator = document.getElementById('uploader-count');
        previewContainer.innerHTML = '';
        
        const files = Array.from(e.target.files);
        
        if(files.length > 5) {
            alert('Solo puedes seleccionar un máximo de 5 imágenes.');
            this.value = '';
            countIndicator.textContent = '(Máximo 5 imágenes, 500KB cada una)';
            return;
        }
        
        if (files.length > 0) {
            countIndicator.textContent = `(${files.length} de 5 imágenes seleccionadas)`;
        } else {
            countIndicator.textContent = '(Máximo 5 imágenes, 500KB cada una)';
        }
        
        files.forEach((file, index) => {
            if (file.size > 512000) {
                alert(`El archivo ${file.name} supera los 500KB permitidos.`);
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(event) {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative group aspect-square rounded-lg overflow-hidden border border-gray-200';
                
                const img = document.createElement('img');
                img.src = event.target.result;
                img.className = 'w-full h-full object-cover';
                
                wrapper.appendChild(img);
                previewContainer.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    });
</script>
@endsection