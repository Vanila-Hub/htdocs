<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];

    $clientes = [
        new Cliente('Juan Perez', 1, $usuario, $password, 3),
        new Cliente('Maria Lopez', 2, $usuario, $password, 2),
        new Cliente('usuario', 2, "usuario", "usuario", 2),
        new Cliente('user', 2, "user", "user", 2),
    ];
    if ($usuario === "admin" && $password === "admin") {

        $_SESSION['usuario'] = $clientes; 
        $_SESSION["soportes"] = $videoclub_datos;
        header("Location: mainAdmin.php");
        exit();
        
    } else {
        foreach ($clientes as $cliente) {
            if ($cliente->getUser() === $usuario && $cliente->getPassword() === $password) {
                $_SESSION['usuario'] = $cliente; 
                header("Location: mainCliente.php");
                exit();
            }
        }

        $_SESSION['error'] = "Usuario o contraseña no válidos!";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
