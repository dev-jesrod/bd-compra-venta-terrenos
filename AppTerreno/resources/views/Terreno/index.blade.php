<h2>Filtro de Terrenos</h2>

<form method="GET" action="{{ route('terrenos.index') }}">
    <input type="text" name="nombre" placeholder="Nombre">

    <input type="text" name="ubicacion" placeholder="Ubicación">

    <select name="estado">
        <option value="">Todos</option>
        <option value="DISPONIBLE">Disponible</option>
        <option value="VENDIDO">Vendido</option>
        <option value="RESERVADO">Reservado</option>
    </select>

    <input type="number" name="precio_min" placeholder="Precio mínimo">
    <input type="number" name="precio_max" placeholder="Precio máximo">

    <button type="submit">Filtrar</button>
</form>

<hr>

@foreach($terrenos as $terreno)
    <p>
        {{ $terreno->nombre }} -
        {{ $terreno->ubicacion }} -
        {{ $terreno->estado }} -
        ${{ $terreno->precio }}
    </p>
@endforeach