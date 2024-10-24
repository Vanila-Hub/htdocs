<?php
// Asegurarse de que la clase Cliente esté cargada
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();


// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuarios = $_SESSION['usuario'];

$videoclub_datos = [];
if (isset($_SESSION['soportes'])) {
    $videoclub_datos = $_SESSION['soportes'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Main</title>
</head>

<body>

    <?php
    foreach ($usuarios as $user) {
        echo "<h1>Bienvenido, " . htmlspecialchars($user->getUser()) . "</h1>";
        echo "<p>Nombre: " . htmlspecialchars($user->getNombre()) . "</p>";
        echo "<p>Número: " . htmlspecialchars($user->getNumero()) . "</p>";
        echo "<p>Máximo Alquiler Concurrente: " . htmlspecialchars($user->getMaxAlquilerConcurrente()) . "</p>";
    }
    ?>

    <p>Pulsa <a href="logout.php">aquí</a> para cerrar la sesión.</p>

    <?php if (!empty($videoclub_datos)): ?>
        <h2>Datos del Videoclub</h2>

        <h3>Soportes</h3>
        <ul>
            <?php foreach ($videoclub_datos['soportes'] as $soporte): ?>
                <li><?php echo $soporte['titulo'] . " (" . $soporte['tipo'] . ") - Precio: " . $soporte['precio']; ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Socios</h3>
        <ul>
            <?php foreach ($videoclub_datos['socios'] as $socio): ?>
                <li><?php echo $socio['nombre'] . " (ID: " . $socio['id'] . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>

</html>