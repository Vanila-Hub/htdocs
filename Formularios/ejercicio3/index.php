<?php
session_start();
$error = ""; // Inicializar la variable de error

// Comprobar si ya está logueado
if (isset($_SESSION['usuario'])) {
    header("Location: main.php"); // Redirigir a main.php si ya está logueado
    exit();
}

// Si hay un error almacenado en la sesión, lo recuperamos
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <div><span class='error'><?php echo htmlspecialchars($error); ?></span></div>
            <div>
                <label for='usuario'>Usuario:</label><br />
                <input type='text' name='inputUsuario' id='usuario' maxlength="50" required /><br />
            </div>
            <div>
                <label for='password'>Contraseña:</label><br />
                <input type='password' name='inputPassword' id='password' maxlength="50" required /><br />
            </div>
            <div>
                <input type='submit' name='enviar' value='Enviar' />
            </div>
        </fieldset>
    </form>
</body>
</html>
