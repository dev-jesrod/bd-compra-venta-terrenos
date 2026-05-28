@props(['verificado' => false, 'nivelConfianza' => 0, 'tamano' => 'sm'])

@if($verificado)
    <span class="inline-flex items-center gap-1 bg-green-50 border border-green-200 {{ $tamano === 'sm' ? 'text-[9px] px-2 py-0.5' : 'text-[10px] px-2.5 py-1' }} rounded-full font-bold uppercase tracking-wider" style="color: #228B22;">
        <span class="material-symbols-outlined {{ $tamano === 'sm' ? 'text-[12px]' : 'text-[14px]' }}">verified</span>
        Vendedor Verificado
    </span>
@else
    <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 border border-gray-200 {{ $tamano === 'sm' ? 'text-[9px] px-2 py-0.5' : 'text-[10px] px-2.5 py-1' }} rounded-full font-bold uppercase tracking-wider">
        <span class="material-symbols-outlined {{ $tamano === 'sm' ? 'text-[12px]' : 'text-[14px]' }}">info</span>
        Sin verificar
    </span>
@endif
