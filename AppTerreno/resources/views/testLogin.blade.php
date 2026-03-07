<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="/AppTerreno/app/Http/Controllers/login.php" method="get">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>