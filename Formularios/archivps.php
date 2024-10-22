<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sticky Form</title>
</head>

<body>
    <?php
    if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
        if (is_uploaded_file($_FILES['archivoEnviado']['tmp_name'])) {

            $nombre = $_FILES['archivoEnviado']['name'];
            move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./uploads/{$nombre}");

            echo "<p>Archivo $nombre subido con éxito</p>";
        }
    }

    ?>
    <h2>Formulario de Contacto</h2>
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Archivo: <input name="archivoEnviado" type="file" />
        <br />
        <input type="submit" name="btnSubir" value="Subir" />
    </form>

</body>

</html>