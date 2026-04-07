<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Registrarse</h2>
<!-- Formulario -->
    <form action="/" method="get">

        <ul>
            <li>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre_usuario" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="apellido1">Apellido paterno:</label>
                <input type="text" id="apellido1" name="apellido_p" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="apellido2">Apellido materno:</label>
                <input type="text" id="apellido2" name="apellido_m" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="sexo">Sexo:</label>
                <input type="text" id="sexo" name="sexo" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_n" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="telefono">Telefono:</label>
                <input type="text" id="telefono" name="numero_telefono" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="correo">Correo electronico:</label>
                <input type="email" id="correo" name="correo_electronico" required >
            </li>
        </ul>

        <ul>
            <li>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required >
            </li>
        </ul>

        <li>
            <button >Registrarse</button>
        </li>

    </form>
<!-- fin Formulario -->

    
</body>
</html>