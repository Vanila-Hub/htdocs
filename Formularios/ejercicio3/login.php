<?php
session_start(); // Iniciar la sesión

if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    // Comprobar las credenciales
    if ($usuario === "admin" && $password === "admin") {
        $_SESSION['usuario'] = $usuario; // Almacenar el usuario en la sesión

        // Almacenar películas y series en la sesión
        $_SESSION['peliculas'] = [
            "Pelicula 1",
            "Pelicula 2",
            "Pelicula 3"
        ];

        $_SESSION['series'] = [
            "Serie 1",
            "Serie 2",
            "Serie 3"
        ];

        header("Location: peliculas.php"); // Redirigir a peliculas.php
        exit();
    } else {
        $_SESSION['error'] = "Usuario o contraseña no válidos!";
        header("Location: index.php"); // Redirigir a index.php
        exit();
    }
} else {
    header("Location: index.php"); // Redirigir si no se envía el formulario
    exit();
}
