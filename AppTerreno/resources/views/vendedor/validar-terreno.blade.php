@extends('layouts.vendedor')

@section('title', 'Validar Terreno - ' . $terreno->nombre)

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('vendedor.terrenos.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-500 hover:text-green-700 transition-colors">
            <span class="material-symbols-outlined text-lg">arrow_back</span>
            Volver a mis propiedades
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-8 border-b border-gray-100">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Validar Terreno</h1>
            <p class="text-sm text-gray-500">Revise la información del terreno y confirme que es correcta para publicarlo en el catálogo.</p>
        </div>

        <div class="p-8">
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <h2 class="text-lg font-bold text-gray-900 mb-4">{{ $terreno->nombre }}</h2>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500 font-medium">Ubicación:</span>
                        <p class="font-semibold">{{ $terreno->ubicacion }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500 font-medium">Precio:</span>
                        <p class="font-semibold">${{ number_format($terreno->precio, 0) }} MXN</p>
                    </div>
                    <div>
                        <span class="text-gray-500 font-medium">Superficie:</span>
                        <p class="font-semibold">{{ number_format($terreno->largo * $terreno->ancho, 0) }} m²</p>
                    </div>
                    <div>
                        <span class="text-gray-500 font-medium">Zonificación:</span>
                        <p class="font-semibold">{{ $terreno->zonificacion ?? 'No especificada' }}</p>
                    </div>
                </div>
                @if($terreno->descripcion)
                <div class="mt-4">
                    <span class="text-gray-500 font-medium text-sm">Descripción:</span>
                    <p class="text-sm text-gray-700 mt-1">{{ $terreno->descripcion }}</p>
                </div>
                @endif
            </div>

            @if($terreno->estado_verificacion === 'RECHAZADO' && $terreno->motivo_rechazo)
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-8">
                <div class="flex items-start gap-3">
                    <span class="material-symbols-outlined text-red-600 mt-0.5">error</span>
                    <div>
                        <h3 class="font-bold text-red-800 text-sm">Motivo de rechazo anterior:</h3>
                        <p class="text-sm text-red-700 mt-1">{{ $terreno->motivo_rechazo }}</p>
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('vendedor.terrenos.validar', $terreno->idTerreno) }}" method="POST" class="space-y-6">
                @csrf

                <div class="bg-gray-50 rounded-xl p-6">
                    <h3 class="font-bold text-gray-900 mb-4">¿La información del terreno es correcta?</h3>
                    <p class="text-sm text-gray-500 mb-6">Confirme que los datos son precisos y está autorizado a vender esta propiedad.</p>

                    <div class="space-y-4">
                        <label class="flex items-center gap-3 p-4 bg-white rounded-xl border-2 border-green-200 cursor-pointer hover:border-green-400 transition-colors has-[:checked]:border-green-600 has-[:checked]:bg-green-50">
                            <input type="radio" name="estado_verificacion" value="APROBADO" class="w-5 h-5 text-green-600 focus:ring-green-500" {{ old('estado_verificacion') === 'APROBADO' ? 'checked' : '' }}>
                            <div>
                                <span class="font-bold text-gray-900">Aprobar y publicar</span>
                                <p class="text-sm text-gray-500">El terreno será visible en el catálogo público</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 p-4 bg-white rounded-xl border-2 border-gray-200 cursor-pointer hover:border-gray-400 transition-colors has-[:checked]:border-red-600 has-[:checked]:bg-red-50">
                            <input type="radio" name="estado_verificacion" value="RECHAZADO" class="w-5 h-5 text-red-600 focus:ring-red-500" {{ old('estado_verificacion') === 'RECHAZADO' ? 'checked' : '' }}>
                            <div>
                                <span class="font-bold text-gray-900">Rechazar</span>
                                <p class="text-sm text-gray-500">El terreno no será publicado hasta corregir los datos</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div id="motivo-rechazo" class="hidden">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Motivo del rechazo *</label>
                    <textarea name="motivo_rechazo" rows="3" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-green-500 focus:border-green-500" placeholder="Describa qué datos son incorrectos o están incompletos...">{{ old('motivo_rechazo') }}</textarea>
                    @error('motivo_rechazo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('vendedor.terrenos.index') }}" class="flex-1 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-xl text-sm text-center transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="flex-1 py-3 bg-green-700 hover:bg-green-800 text-white font-bold rounded-xl text-sm transition-colors">
                        Confirmar Decisión
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="estado_verificacion"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var motivoBox = document.getElementById('motivo-rechazo');
            var motivoTextarea = document.querySelector('textarea[name="motivo_rechazo"]');
            if (this.value === 'RECHAZADO') {
                motivoBox.classList.remove('hidden');
                motivoTextarea.required = true;
            } else {
                motivoBox.classList.add('hidden');
                motivoTextarea.required = false;
            }
        });
    });
</script>
@endsection
