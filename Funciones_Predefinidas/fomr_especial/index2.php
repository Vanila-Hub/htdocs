<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $nombres = isset($_POST['nombres']) ? json_decode($_POST['nombres'],true) : [];
    $apellidos = isset($_POST['apellidos'])? json_decode($_POST['apellidos'],true) : [];

    if (isset($_POST['apellido'])) {
        $apellidoNueo = trim($_POST['apellido']);
        $apellidos[]=$apellidoNueo;
        print_r(explode(",",$apellidoNueo));
    }
    if (isset($_POST['nombres'])) {
        $nombreNuevo = trim($_POST["nombre"]);

        if (!empty($nombreNuevo)) {
            $nombres[] = $nombreNuevo;
        }
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Introduzca el nombre</label>
        <input type="text" id="nombre" name="nombre">
        
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido">
        
        <input type="submit" name="submit" value="Submit Form"><br>
        <input type="hidden" name="apellidos" name="apellidos" valeu='<?php echo json_encode($apellidos); ?>'>
        <input type="hidden" name="nombres" id="nombres" value='<?php echo json_encode($nombres); ?>'>
    </form>
    <?php

    if (!empty($nombres)) {
        echo "<h1>Nombres</h1><ol>";
        foreach ($nombres as $nombre) {
            echo "<li>$nombre</li>";
        }
        echo "</ol>";
    }
    if (!empty($apellidos)) {
        echo "<h1>Apellidos</h1><ol>";
        foreach ($apellidos as $apellido) {
            echo "<li>$apellido</li>";
        }
        echo "</ol>";
    }
    ?>
</body>

</html>