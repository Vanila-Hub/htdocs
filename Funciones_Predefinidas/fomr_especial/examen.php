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
    $nuevoNombre = isset($_REQUEST['nombre']) ? trim($_REQUEST['nombre']) : "-";
    $nuevoTelefono = isset($_REQUEST['telefono']) ? trim($_REQUEST['telefono']) : "-";
    $nombres = isset($_REQUEST['nombres']) ? explode(",", $_REQUEST['nombres']) : [];
    $telefonos = isset($_REQUEST['telefonos']) ? explode(",", $_REQUEST['telefonos']) : [];

    if (isset($nuevoNombre) && isset($nuevoTelefono)) {
        if (!empty($nuevoNombre)) {
            // Si el nombre que se introdujo no existe en la agenda, y el número de teléfono no
            // está vacío, se añadirá a la agenda.
            if (!in_array($nuevoNombre, $nombres) && !empty($nuevoTelefono)) {
                if (!empty($nuevoNombre) && !empty($nuevoTelefono)) {
                    array_push($nombres, $nuevoNombre);
                    array_push($telefonos, $nuevoTelefono);
                }
                //             Si el nombre que se introdujo ya existe en la agenda y se indica un número de
                // teléfono, se sustituirá el número de teléfono anterior.

            }
            if (in_array($nuevoNombre, $nombres)) {
                foreach ($nombres as $key => $value) {
                    if ($nuevoNombre === $value && empty($nuevoTelefono)) {
                        $nombres[$key] = "contacto borrado";
                        $telefonos[$key] = "contacto borrado";
                    } else if ($nuevoNombre === $value && !empty($nuevoTelefono)) {
                        foreach ($telefonos as $clave => $valor) {
                            if ($nuevoTelefono !== $valor) {
                                $telefonos[$key] = $nuevoTelefono;
                            }
                        }
                    }
                }
            }
        } else {
            echo "<h1>Nombre esta vacio</h1>";
        }
    }

    ?>
    <div class="form">
        <form action="<?php $_PHP_SELF ?>">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre">
            <label for="telefono">Numero</label>
            <input type="text" name="telefono" id="telefono">
    
    
            <input type="hidden" name="telefonos" value="<?php echo implode(",", ($telefonos)) ?>">
            <input type="hidden" name="nombres" value="<?php echo implode(",", ($nombres)) ?>">
    
            <input type="submit">
        </form>

        <div>
    
            <?php
            if (isset($nuevoTelefono)) {
                echo "Telefonos: <br>";
                echo "<ol>";
                foreach ($telefonos as $telefono) {
                    echo "<li>$telefono</li>";
                }
                echo "</ol>";
            }
            if (!empty($nuevoNombre)) {
                echo "<ol>";
                echo "Nombres: <br>";
                foreach ($nombres as $nombre) {
                    echo "<li>$nombre</li>";
                }
                echo "</ol>";
            }
            ?>
        </div>
    </div>

</body>

</html>