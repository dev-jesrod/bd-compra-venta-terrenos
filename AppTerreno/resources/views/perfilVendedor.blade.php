<!DOCTYPE html>
<html>
<head>
    <title>Perfil Vendedor</title>
</head>
<body>

<h1>Perfil de Vendedor</h1>

@if($vendedor)
    <p>Nombre: {{ $vendedor->usuario->name }}</p>
    <p>Email: {{ $vendedor->usuario->email }}</p>
    <p>RFC: {{ $vendedor->rfc }}</p>
    <p>Utilidad: {{ $vendedor->utilidad }}</p>
@else
    <p>No hay vendedor</p>
@endif
</body>
</html>