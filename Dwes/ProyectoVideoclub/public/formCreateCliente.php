<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Nuevo Cliente</h1>
    <form action="createCliente.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
        <br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" min="1">
        <br><br>

        <label for="alquiler">Máximo Alquiler Concurrente:</label>
        <input type="number" id="alquiler" name="alquiler" min="1">
        <br><br>

        <button type="submit">Crear Cliente</button>
    </form>
    <br>
    <a href="mainAdmin.php">Volver</a>
</body>
</html>
