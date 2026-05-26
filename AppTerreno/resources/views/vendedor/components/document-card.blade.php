<div class="bg-white dark:bg-slate-900 p-6 rounded-xl border {{ $doc && $doc->estado === 'RECHAZADO' ? 'border-red-500 shadow-red-500/5 ring-1 ring-red-500/20' : 'border-gray-200 dark:border-gray-800' }} shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between min-h-[220px]">
    <div>
        <div class="flex justify-between items-start mb-4">
            <!-- Icon based on status -->
            @if(!$doc)
                <div class="p-2 bg-slate-100 dark:bg-slate-800 rounded-lg text-slate-400">
                    <span class="material-symbols-outlined">description</span>
                </div>
                <span class="flex items-center gap-1 text-[10px] font-extrabold text-slate-500 bg-slate-100 dark:bg-slate-800 px-2.5 py-1 rounded-full uppercase">
                    No Subido
                </span>
            @elseif($doc->estado === 'PENDIENTE')
                <div class="p-2 bg-amber-50 dark:bg-amber-900/20 rounded-lg text-amber-600 dark:text-amber-400">
                    <span class="material-symbols-outlined">hourglass_empty</span>
                </div>
                <span class="flex items-center gap-1 text-[10px] font-extrabold text-amber-700 bg-amber-100 dark:bg-amber-900/40 px-2.5 py-1 rounded-full uppercase">
                    En Revisión
                </span>
            @elseif($doc->estado === 'APROBADO')
                <div class="p-2 bg-green-50 dark:bg-green-900/20 rounded-lg text-green-700 dark:text-green-400">
                    <span class="material-symbols-outlined">check_circle</span>
                </div>
                <span class="flex items-center gap-1 text-[10px] font-extrabold text-green-700 bg-green-100 dark:bg-green-900/40 px-2.5 py-1 rounded-full uppercase">
                    Aprobado
                </span>
            @elseif($doc->estado === 'RECHAZADO')
                <div class="p-2 bg-red-50 dark:bg-red-900/20 rounded-lg text-red-600 dark:text-red-400">
                    <span class="material-symbols-outlined">error</span>
                </div>
                <span class="flex items-center gap-1 text-[10px] font-extrabold text-red-700 bg-red-100 dark:bg-red-900/40 px-2.5 py-1 rounded-full uppercase">
                    Rechazado
                </span>
            @endif
        </div>

        <h4 class="font-bold text-gray-900 dark:text-white mb-1">{{ $title }}</h4>
        <p class="text-xs text-gray-500 mb-4">{{ $desc }}</p>
        
        <!-- Rejection Reason if Rejected -->
        @if($doc && $doc->estado === 'RECHAZADO' && $doc->motivo_rechazo)
            <div class="bg-red-50 dark:bg-red-950/20 border border-red-100 dark:border-red-900/40 rounded-lg p-3 mb-4">
                <p class="text-xs text-red-700 dark:text-red-400 font-bold flex items-start gap-1">
                    <span class="material-symbols-outlined text-[14px] mt-0.5 flex-shrink-0">warning</span>
                    <span>Motivo: {{ $doc->motivo_rechazo }}</span>
                </p>
            </div>
        @endif
    </div>

    <!-- Actions -->
    <div>
        @if(!$doc)
            <!-- Upload Form -->
            <form action="{{ route('vendedor.documentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nombre" value="{{ $name }}">
                <div class="relative w-full">
                    <input type="file" name="archivo" accept=".pdf,.png,.jpg,.jpeg" onchange="this.form.submit()" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <button type="button" class="w-full py-2.5 px-4 rounded-lg bg-slate-900 dark:bg-slate-800 text-white font-bold text-xs hover:opacity-90 transition-opacity flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">upload</span> Subir archivo
                    </button>
                </div>
            </form>
        @elseif($doc->estado === 'RECHAZADO')
            <!-- Reupload Form -->
            <form action="{{ route('vendedor.documentos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="nombre" value="{{ $name }}">
                <div class="relative w-full">
                    <input type="file" name="archivo" accept=".pdf,.png,.jpg,.jpeg" onchange="this.form.submit()" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <button type="button" class="w-full py-2.5 px-4 rounded-lg bg-red-600 text-white font-bold text-xs hover:bg-red-700 transition-colors flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">replay</span> Subir de nuevo
                    </button>
                </div>
            </form>
        @else
            <!-- View File Button -->
            <a href="{{ asset('storage/' . $doc->ruta_archivo) }}" target="_blank" class="w-full py-2.5 px-4 rounded-lg border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-xs font-semibold hover:bg-gray-50 dark:hover:bg-slate-800 transition-colors flex items-center justify-center gap-1">
                <span class="material-symbols-outlined text-sm">visibility</span> Ver Archivo
            </a>
        @endif
    </div>
</div>
