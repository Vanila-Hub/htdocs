<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descomposición de Dinero</title>
</head>

<body>
    <h1>Descomposición de edad</h1>

    <?php
        $edad = 25;
        switch ($edad) {
            case $edad < 3:
                echo "Estas bebé";
                break;
            case $edad >= 3 && $edad <= 12:
                echo "Estas niño";
                break;
            case $edad >= 13 && $edad <= 17:
                echo "Estas adolescente";
                break;
            case $edad >= 18 && $edad <= 66:
                echo "Estas adulto";
                break;
            
            default:
                echo "Estas jubilado";
                break;
        }
    ?>
</body>

</html>
