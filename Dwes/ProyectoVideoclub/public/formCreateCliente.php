<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Nuevo Cliente</h1>
    <form action="createCliente.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required>
        <br>
        <button type="submit">Crear Cliente</button>
    </form>
    <a href="mainAdmin.php">Volver</a>
</body>
</html>
