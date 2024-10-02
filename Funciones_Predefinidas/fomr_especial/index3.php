<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <?php
    $nuevoNombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
    $nombres = isset($_REQUEST['nombres']) ? explode(",", $_REQUEST['nombres']) : [];

    if (!empty($nuevoNombre)) {
        array_push($nombres, $nuevoNombre);
    }
    ?>
    <form action="<?php $_PHP_SELF ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <input type="hidden" name="nombres" value="<?php echo implode(",", $nombres) ?>">
        <input type="submit">
    </form>
    <?php
    if (!empty($nombres)) {
        echo "Nombres: <br>";
        echo "<ol>";
        $nombres = array_unique($nombres);    
        foreach ($nombres as $nombre) {
            echo "<li>$nombre</li>";
        }
        echo "</ol>";
    }
    ?>
</body>

</html>