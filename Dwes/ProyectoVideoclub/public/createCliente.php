<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $numero = (int)$_POST['numero'];

    // Validar los datos (puedes agregar más validaciones según tus requisitos)
    if (empty($nombre) || empty($usuario) || empty($password) || empty($numero)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        header("Location: formCreateCliente.php");
        exit();
    }

    // Crear un nuevo cliente
    $nuevoCliente = new Cliente($nombre, $numero, $usuario, $password);

    // Agregar el nuevo cliente a la sesión
    $_SESSION['clientes'][] = $nuevoCliente;

    // Redirigir a mainAdmin.php
    header("Location: mainAdmin.php");
    exit();
} else {
    header("Location: formCreateCliente.php");
    exit();
}
