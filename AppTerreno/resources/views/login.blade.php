<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion -- MazTerrenos</title>
</head>

<body>
    
    <h2>Inicio de Sesion</h2>
<!-- Formulario -->
    <form action="/" method="get">

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
            <button >Enviar</button>
        </li>

    </form>
<!-- fin Formulario -->

    <p>¿Quieres empezar a comprar? <a href="/registro">Registrate</a> </p>

</body>

</html>