<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start(); // inicializamos
    $_SESSION["nombre"] = "Maitane"; // asignamos
    $usuario = $_SESSION["nombre"]; // recuperamos
    echo "Soy el usuario:  $usuario ";
    ?>
    <br />
    <a href="sesion2.php">Y luego</a>
</body>
</html>