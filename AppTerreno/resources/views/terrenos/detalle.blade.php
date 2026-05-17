<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Terreno</title>
</head>
<body>

    <h1>{{ $terreno->nombre }}</h1>

    <p><strong>Descripción:</strong> {{ $terreno->descripcion }}</p>

    <p><strong>Precio:</strong> ${{ $terreno->precio }}</p>

    <p><strong>Ubicación:</strong> {{ $terreno->ubicacion }}</p>

    <p><strong>Estado:</strong> {{ $terreno->estado }}</p>

</body>
</html>