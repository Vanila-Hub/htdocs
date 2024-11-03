<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $alquiler = trim($_POST['alquiler']);
    $numero = $_POST['numero'];

    if (empty($nombre) || empty($usuario) || empty($password) || $numero <= 0 || $alquiler <= 0) {
        $_SESSION['error'] = "Todos los campos son obligatorios y deben ser válidos.";
        header("Location: formCreateCliente.php");
        exit();
    }

    $nuevoCliente = new Cliente($nombre, $numero, $usuario, $password, $alquiler);

    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = [];
    }

    $_SESSION['usuario'][] = $nuevoCliente;

    header("Location: mainAdmin.php");
    exit();
} else {
    header("Location: formCreateCliente.php");
    exit();
}
