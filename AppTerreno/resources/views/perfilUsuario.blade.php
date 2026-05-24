<!DOCTYPE html>
<html>
<head>
    <title>Perfil Usuario</title>
</head>
<body>

<h1>Perfil de Usuario</h1>

@if($usuario)
    <p>Nombre: {{ $usuario->name }}</p>
    <p>Email: {{ $usuario->email }}</p>
@else
    <p>No hay usuario registrado</p>
@endif
</body>
</html>