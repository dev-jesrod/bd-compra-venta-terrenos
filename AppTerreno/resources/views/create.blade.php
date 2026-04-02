<form action="/terrenos" method="POST">
    @csrf

    <input type="number" name="idUsuario">
    <input type="text" name="nombre">
    <input type="text" name="estado">
    <input type="number" name="largo">
    <input type="number" name="ancho">
    <input type="text" name="descripcion">
    <input type="number" name="precio">

    <button type="submit">Guardar</button>
</form>