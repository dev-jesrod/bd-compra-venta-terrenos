@props(['estadoVerificacion' => 'PENDIENTE', 'motivoRechazo' => null, 'tamano' => 'sm'])

@php
    $sizes = $tamano === 'sm' ? 'text-[9px] px-2 py-0.5' : 'text-[10px] px-2.5 py-1';
    $iconSizes = $tamano === 'sm' ? 'text-[12px]' : 'text-[14px]';
@endphp

@if($estadoVerificacion === 'APROBADO')
    <span class="inline-flex items-center gap-1 bg-green-50 border border-green-200 {{ $sizes }} rounded-full font-bold uppercase tracking-wider" style="color: #228B22;">
        <span class="material-symbols-outlined {{ $iconSizes }}">verified</span>
        Terreno Verificado
    </span>
@elseif($estadoVerificacion === 'RECHAZADO')
    <span class="inline-flex items-center gap-1 bg-red-50 text-red-700 border border-red-200 {{ $sizes }} rounded-full font-bold uppercase tracking-wider" title="{{ $motivoRechazo }}">
        <span class="material-symbols-outlined {{ $iconSizes }}">cancel</span>
        Rechazado
    </span>
@else
    <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 border border-amber-200 {{ $sizes }} rounded-full font-bold uppercase tracking-wider">
        <span class="material-symbols-outlined {{ $iconSizes }}">pending</span>
        En revisión
    </span>
@endif
