<?php
// Asegurarse de que la clase Cliente esté cargada
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Comprobar si se ha pasado el número del cliente
if (isset($_GET['numero'])) {
    $clienteNumero = $_GET['numero'];

    // Obtener la lista de clientes desde la sesión
    $usuarios = $_SESSION['usuario'];

    // Filtrar la lista de clientes para eliminar el cliente seleccionado
    $usuariosActualizados = array_filter($usuarios, function ($cliente) use ($clienteNumero) {
        return $cliente instanceof Cliente && $cliente->getNumero() != $clienteNumero; // Retornar los clientes que no son el seleccionado
    });

    // Guardar la lista actualizada de usuarios en la sesión
    $_SESSION['usuario'] = array_values($usuariosActualizados);

    // Redirigir de vuelta a la página principal
    header("Location: mainAdmin.php");
    exit();
} else {
    echo "Error: Número de cliente no proporcionado.";
}
?>
