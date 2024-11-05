<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientName = trim($_POST['nombre']);
    $clientUsername = trim($_POST['usuario']);
    $clientPassword = trim($_POST['password']);
    $rentalLimit = trim($_POST['alquiler']);
    $clientNumber = $_POST['numero'];

    if (empty($clientName) || empty($clientUsername) || empty($clientPassword) || $clientNumber <= 0 || $rentalLimit <= 0) {
        $_SESSION['error'] = "Todos los campos son obligatorios y deben ser válidos.";
        header("Location: formCreateCliente.php");
        exit();
    }

    $newClient = new Cliente($clientName, $clientNumber, $clientUsername, $clientPassword, $rentalLimit);

    if (!isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = [];
    }

    $_SESSION['usuario'][] = $newClient;

    header("Location: mainAdmin.php");
    exit();
} else {
    header("Location: formCreateCliente.php");
    exit();
}
