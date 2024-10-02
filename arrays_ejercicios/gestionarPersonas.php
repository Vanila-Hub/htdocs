<?php
    $nombres = $_POST['nombre'];
    $alturas = $_POST['altura'];
    $emails = $_POST['email'];


    $alturaMax = max($alturas);
    $alturaMin = min($alturas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de las Personas</title>
    <style>
        .max { background-color: lightgreen; }
        .min { background-color: lightcoral; }
        table { border-collapse: collapse; width: 100%; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: center; }
    </style>
</head>
<body>
    <h1>Datos de las Personas</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Altura (cm)</th>
            <th>Email</th>
        </tr>
        <?php
        foreach ($nombres as $index => $nombre) {
            $altura = $alturas[$index];
            $email = $emails[$index];


            $class = '';
            if ($altura == $alturaMax) {
                $class = 'max';
            } elseif ($altura == $alturaMin) {
                $class = 'min';
            }

            echo "<tr class='$class'>";
            echo "<td>$nombre</td>";
            echo "<td>$altura</td>";
            echo "<td>$email</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
