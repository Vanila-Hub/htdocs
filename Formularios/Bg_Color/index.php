    <?php
    $_bgColor = "";

    if (isset($_COOKIE["bgColor"])) {
        $_bgColor = $_COOKIE["bgColor"];
        echo $_bgColor;
    }else{
        $_bgColor = "white";
    }
    if (isset($_GET["bgColor"])) {
        setcookie("bgColor", $_GET["bgColor"], time() + 6);
    }
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar color de fondo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .color-preview {
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            margin: 10px 0;
        }
    </style>

</head>

<body style="background-color: <?php echo $_bgColor ?>;">

    <h1>Elige un color de fondo</h1>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get">
        <label for="bgColor">Selecciona un color:</label>
        <select id="bgColor" name="bgColor">
            <option <?php $_bgColor = "white" ?>>Blanco</option>
            <option value="gray">Gris</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarillo</option>
            <option value="pink">Rosa</option>
        </select>
        <button type="submit">Cambiar color de fondo</button>
    </form>
</body>

</html>