<?php
session_start(); // Iniciar la sesión

// Comprobar que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a>.<br />");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>
<body>
    <h1>Bienvenido <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
    <p>Pulse <a href="logout.php">aquí</a> para salir</p>
    <h2>Listado de Productos</h2>
    <ul>
        <li>Producto 1</li>
        <li>Producto 2</li>
        <li>Producto 3</li>
    </ul>
    <p>Volver al <a href="index.php">inicio</a></p>
</body>
</html>
