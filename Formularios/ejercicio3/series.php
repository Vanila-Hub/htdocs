<?php
session_start(); // Iniciar la sesión

// Comprobar que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a>.<br />");
}

$series = $_SESSION['series']; // Obtener las series de la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Series</title>
</head>
<body>
    <h1>Listado de Series</h1>
    <ul>
        <?php foreach ($series as $serie): ?>
            <li><?= htmlspecialchars($serie) ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="peliculas.php">Ver Listado de Películas</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
