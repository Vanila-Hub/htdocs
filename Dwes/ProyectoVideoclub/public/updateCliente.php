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
if (empty($nombre) || empty($usuario) || empty($password) || empty($numero) || empty($alquiler)) {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
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
$cliente->setPassword($password);
$cliente->setNumero($numero);
$cliente->setMaxAlquilerConcurrente($alquiler);

// Guardar el cliente actualizado en la sesión
$_SESSION['clientes'][$clienteId] = $cliente;

// Redirigir al listado de clientes
header("Location: mainAdmin.php");
exit();
