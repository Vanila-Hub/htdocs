<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ingreso de Personas</title>
</head>
<body>
    <h1>Ingrese los datos de las personas</h1>
    <form action="gestionarPersonas.php" method="POST">
        <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">

        <?php
        $cantidad = $_GET['cantidad'];
        for ($i = 1; $i <= $cantidad; $i++) {
            echo "<h2>Persona $i</h2>";
            echo "<label for='nombre$i'>Nombre:</label>";
            echo "<input type='text' id='nombre$i' name='nombre[]' required><br><br>";

            echo "<label for='altura$i'>Altura (en cm):</label>";
            echo "<input type='number' id='altura$i' name='altura[]' required><br><br>";

            echo "<label for='email$i'>Email:</label>";
            echo "<input type='email' id='email$i' name='email[]' required><br><br>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
