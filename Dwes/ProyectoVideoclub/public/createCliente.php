<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $alquiler = trim($_POST['alquiler']); // Convertir a entero
    $numero = $_POST['numero']; // Convertir a entero

    // Validar los datos
    if (empty($nombre) || empty($usuario) || empty($password) || $numero <= 0 || $alquiler <= 0) {
        $_SESSION['error'] = "Todos los campos son obligatorios y deben ser válidos.";
        header("Location: formCreateCliente.php");
        exit();
    }

    // Crear un nuevo cliente
    $nuevoCliente = new Cliente($nombre, $numero, $usuario, $password, $alquiler);

    // Verificar si 'usuario' está definido como array en la sesión y agregar el cliente
    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = [];
    }

    $_SESSION['usuario'][] = $nuevoCliente;

    // Redirigir a mainAdmin.php
    header("Location: mainAdmin.php");
    exit();
} else {
    header("Location: formCreateCliente.php");
    exit();
}
