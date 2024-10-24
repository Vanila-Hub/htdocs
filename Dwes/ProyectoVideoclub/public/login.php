<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;

session_start();  

if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    if ($usuario === "admin" && $password === "admin") {
        $clientes = [
            new Cliente('Juan Perez', 1, $usuario, $password, 3),
            new Cliente('Maria Lopez', 2, $usuario, $password, 2),
        ];

        $_SESSION['usuario'] = $clientes; 
        $videoclub_datos = [
            'soportes' => [
                ['titulo' => 'Star Wars', 'tipo' => 'CintaVideo', 'precio' => 10, 'duracion' => 120],
                ['titulo' => 'Matrix', 'tipo' => 'Dvd', 'precio' => 15, 'idiomas' => 'Inglés, Español', 'pantalla' => '16:9'],
                ['titulo' => 'FIFA 2022', 'tipo' => 'Juego', 'precio' => 60, 'consola' => 'PS5', 'min_jugadores' => 1, 'max_jugadores' => 4],
            ],
            'socios' => [
                ['nombre' => 'Juan Pérez', 'id' => 0],
                ['nombre' => 'María López', 'id' => 1],
            ]
        ];
        $_SESSION["soportes"] = $videoclub_datos;
        header("Location: mainAdmin.php"); // Redirigir a peliculas.php
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
