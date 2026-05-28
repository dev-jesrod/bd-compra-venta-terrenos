<div class="bg-white p-6 rounded-xl border {{ $doc && $doc->estado === 'RECHAZADO' ? 'border-red-500 ring-1 ring-red-500/20' : 'border-gray-200' }} shadow-sm flex flex-col sm:flex-row items-center gap-6 hover:shadow-md transition-all duration-300 w-full">
    <div class="flex-shrink-0 p-4 bg-gray-50 rounded-xl text-green-700 flex items-center justify-center">
        @if($name === 'Comprobante Domicilio')
            <span class="material-symbols-outlined text-4xl">home_pin</span>
        @else
            <span class="material-symbols-outlined text-4xl">account_balance</span>
        @endif
    </div>
    
    <div class="flex-grow text-center sm:text-left">
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 mb-2 justify-center sm:justify-start">
            <h4 class="font-bold text-gray-900">{{ $title }}</h4>
            
            @if(!$doc)
                <span class="inline-flex items-center gap-1 text-[9px] uppercase tracking-wider font-bold text-slate-500 bg-slate-100 px-2 py-0.5 rounded">No Subido</span>
            @elseif($doc->estado === 'PENDIENTE')
                <span class="inline-flex items-center gap-1 text-[9px] uppercase tracking-wider font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded">En Revisión</span>
            @elseif($doc->estado === 'APROBADO')
                <span class="inline-flex items-center gap-1 text-[9px] uppercase tracking-wider font-bold text-green-700 bg-green-50 px-2 py-0.5 rounded">Aprobado</span>
            @elseif($doc->estado === 'RECHAZADO')
                <span class="inline-flex items-center gap-1 text-[9px] uppercase tracking-wider font-bold text-red-700 bg-red-50 px-2 py-0.5 rounded">Rechazado</span>
            @endif
        </div>
        <p class="text-sm text-gray-500 mb-2">{{ $desc }}</p>
        
        <!-- Rejection Reason if Rejected -->
        @if($doc && $doc->estado === 'RECHAZADO' && $doc->motivo_rechazo)
            <div class="bg-red-50 border border-red-100 rounded-lg p-2.5 mb-2 max-w-md inline-block">
                <p class="text-xs text-red-700 font-bold flex items-start gap-1">
                    <span class="material-symbols-outlined text-[13px] mt-0.5 flex-shrink-0">warning</span>
                    <span>Motivo: {{ $doc->motivo_rechazo }}</span>
                </p>
            </div>
        @endif
    </div>
    
    <div class="flex-shrink-0 w-full sm:w-auto">
        @if(!$doc)
            <!-- Upload Form -->
            <form action="{{ route('vendedor.documentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nombre" value="{{ $name }}">
                <div class="relative w-full sm:w-auto">
                    <input type="file" name="archivo" accept=".pdf,.png,.jpg,.jpeg" onchange="if(confirm('¿Deseas subir este archivo para su revisión?')) this.form.submit(); else this.value='';" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <button type="button" class="w-full sm:w-auto bg-[#228b22] text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:opacity-90 transition-opacity">
                        Subir archivo
                    </button>
                </div>
            </form>
        @elseif($doc->estado === 'RECHAZADO')
            <!-- Reupload Form -->
            <form action="{{ route('vendedor.documentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nombre" value="{{ $name }}">
                <div class="relative w-full sm:w-auto">
                    <input type="file" name="archivo" accept=".pdf,.png,.jpg,.jpeg" onchange="if(confirm('¿Deseas subir nuevamente este archivo para su revisión?')) this.form.submit(); else this.value='';" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <button type="button" class="w-full sm:w-auto bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-red-700 transition-colors">
                        Subir de nuevo
                    </button>
                </div>
            </form>
        @else
            <!-- View, Change and Delete Actions -->
            <div class="flex flex-col sm:flex-row items-center gap-3">
                <a href="{{ asset('storage/' . $doc->ruta_archivo) }}" target="_blank" class="text-green-700 font-bold text-sm hover:underline flex items-center justify-center gap-0.5">
                    <span class="material-symbols-outlined text-sm">visibility</span> Ver Documento
                </a>
                
                <!-- Change Document Form -->
                <form action="{{ route('vendedor.documentos.store') }}" method="POST" enctype="multipart/form-data" class="inline">
                    @csrf
                    <input type="hidden" name="nombre" value="{{ $name }}">
                    <div class="relative inline-block">
                        <input type="file" name="archivo" accept=".pdf,.png,.jpg,.jpeg" onchange="if(confirm('¿Estás seguro de que deseas reemplazar el archivo actual?')) this.form.submit(); else this.value='';" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <button type="button" class="text-green-700 font-bold text-sm hover:underline flex items-center justify-center gap-0.5">
                            <span class="material-symbols-outlined text-sm">edit</span> Cambiar
                        </button>
                    </div>
                </form>

                <!-- Retire Document Form (DELETE) -->
                <form action="{{ route('vendedor.documentos.destroy', $doc->idDocumento) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas retirar y eliminar permanentemente este documento?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 font-bold text-sm hover:underline flex items-center justify-center gap-0.5">
                        <span class="material-symbols-outlined text-sm">delete</span> Retirar
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>
