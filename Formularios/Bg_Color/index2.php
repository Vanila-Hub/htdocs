<?php
session_start();

$color_seleccionado = isset($_SESSION['color_fondo']) ? $_SESSION['color_fondo'] : "#FFFFFF";

if (isset($_GET['vaciar_sesion']) && $_GET['vaciar_sesion'] == 'true') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color desde Sesión</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($color_seleccionado); ?>;">

    <h1>Color seleccionado</h1>
    <p>El color de fondo actual es: <?php echo htmlspecialchars($color_seleccionado); ?></p>

    <a href="index.php">Volver a la página anterior</a><br>
    <a href="index2.php?vaciar_sesion=true">Vaciar sesión y volver</a>

</body>
</html>
