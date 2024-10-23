<?php
session_start(); // Iniciar la sesión

// Comprobar que el usuario esté autenticado
if (!isset($_SESSION['usuario'])) {
    die("Error - debe <a href='index.php'>identificarse</a>.<br />");
}

$peliculas = $_SESSION['peliculas']; // Obtener las películas de la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Películas</title>
</head>
<body>
    <h1>Listado de Películas</h1>
    <ul>
        <?php foreach ($peliculas as $pelicula): ?>
            <li><?= htmlspecialchars($pelicula) ?></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="series.php">Ver Listado de Series</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
