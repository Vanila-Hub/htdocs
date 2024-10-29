<?php
session_start();
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

// Verifica si el usuario está logueado y tiene permisos de administrador
if (!isset($_SESSION['usuario']) || !$_SESSION['isAdmin']) {
    header("Location: index.php");
    exit();
}

// Obtener los datos enviados por el formulario
$clienteId = $_POST['clienteId'] ?? null;
$nombre = trim($_POST['nombre']);
$usuario = trim($_POST['usuario']);
$password = trim($_POST['password']);
$numero = (int) $_POST['numero'];
$alquiler = (int) $_POST['alquiler'];

// Validar los datos
if (empty($nombre) || empty($usuario) || empty($numero) || empty($alquiler)) {
    $_SESSION['error'] = "Todos los campos son obligatorios excepto la contraseña.";
    header("Location: formUpdateCliente.php?id=$clienteId");
    exit();
}

// Validar que número y alquiler son positivos
if ($numero <= 0 || $alquiler <= 0) {
    $_SESSION['error'] = "El número y el máximo de alquiler concurrente deben ser positivos.";
    header("Location: formUpdateCliente.php?id=$clienteId");
    exit();
}

// Obtener el cliente a modificar
$cliente = $_SESSION['clientes'][$clienteId] ?? null;
if (!$cliente) {
    $_SESSION['error'] = "Cliente no encontrado.";
    header("Location: mainAdmin.php");
    exit();
}

// Actualizar los datos del cliente
$cliente->setNombre($nombre);
$cliente->setUser($usuario);

// Actualizar la contraseña solo si se proporciona
if (!empty($password)) {
    $cliente->setPassword($password);
}

$cliente->setNumero($numero);
$cliente->setMaxAlquilerConcurrente($alquiler);

// Guardar el cliente actualizado en la sesión
$_SESSION['clientes'][$clienteId] = $cliente;

// Redirigir al listado de clientes
header("Location: mainAdmin.php");
exit();
