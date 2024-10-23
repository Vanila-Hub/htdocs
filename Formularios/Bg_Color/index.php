<?php
session_start();

if (isset($_POST['color'])) {
    $_SESSION['color_fondo'] = $_POST['color'];
}

$color_seleccionado = isset($_SESSION['color_fondo']) ? $_SESSION['color_fondo'] : "#FFFFFF";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Color de Fondo con Sesión</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($color_seleccionado); ?>;">

    <form method="POST" action="">
        <label for="color">Selecciona un color:</label>
        <select name="color" id="color">
            <option value="#FFFFFF" <?php if ($color_seleccionado == '#FFFFFF') echo 'selected'; ?>>Blanco</option>
            <option value="#FF0000" <?php if ($color_seleccionado == '#FF0000') echo 'selected'; ?>>Rojo</option>
            <option value="#00FF00" <?php if ($color_seleccionado == '#00FF00') echo 'selected'; ?>>Verde</option>
            <option value="#0000FF" <?php if ($color_seleccionado == '#0000FF') echo 'selected'; ?>>Azul</option>
            <option value="#FFFF00" <?php if ($color_seleccionado == '#FFFF00') echo 'selected'; ?>>Amarillo</option>
            <option value="#FFA500" <?php if ($color_seleccionado == '#FFA500') echo 'selected'; ?>>Naranja</option>
            <option value="#800080" <?php if ($color_seleccionado == '#800080') echo 'selected'; ?>>Púrpura</option>
        </select>
        <input type="submit" value="Cambiar color">
    </form>

    <a href="index2.php">Ver color en otra página</a>

</body>
</html>
