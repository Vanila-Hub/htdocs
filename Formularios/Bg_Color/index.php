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

    <?php
    $bgColor = "red";
    if (isset($_POST["bgColor"])) {
        echo $_POST["bgColor"];
    }
    ?>
</head>

<body style="background-color: <?php htmlspecialchars($bgColor)?>;">
    <h1>Elige un color de fondo</h1>

    <form id="colorForm" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <label for="bgColor">Selecciona un color:</label>
        <select id="bgColor" name="bgColor">
            <option value="Blanco">Blanco</option>
            <option value="Gris">Gris</option>
            <option value="Azul">Azul</option>
            <option value="Verde">Verde</option>
            <option value="Amarillo">Amarillo</option>
            <option value="Rosa">Rosa</option>
        </select>
        <button type="submit">Cambiar color de fondo</button>
    </form>
</body>

</html>