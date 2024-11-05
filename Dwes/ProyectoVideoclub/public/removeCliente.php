<?php
/**
 * Este script se encarga de eliminar un cliente de la sesión.
 * 
 * - Se inicia la sesión para acceder a la información almacenada.
 * - Se verifica si el usuario está logueado comprobando la variable de sesión 'usuario'.
 * - Si el usuario no está logueado, se redirige a la página de inicio (index.php).
 * - Se comprueba si se ha proporcionado un número de cliente a través de la variable GET 'numero'.
 * - Si se ha proporcionado, se obtiene la lista de clientes de la sesión.
 * - Luego, se filtra la lista de clientes para excluir el cliente cuyo número coincide con el número proporcionado.
 * - La lista actualizada de clientes se almacena nuevamente en la sesión.
 * - Finalmente, se redirige al usuario a la página principal del administrador (mainAdmin.php).
 * 
 * Si no se proporciona un número de cliente, se muestra un mensaje de error.
 */

require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['numero'])) {
    $clienteNumero = $_GET['numero'];
    $usuarios = $_SESSION['usuario'];
    $usuariosActualizados = array_filter($usuarios, function ($cliente) use ($clienteNumero) {
        return $cliente instanceof Cliente && $cliente->getNumero() != $clienteNumero;
    });

    $_SESSION['usuario'] = array_values($usuariosActualizados);
    header("Location: mainAdmin.php");
    exit();
} else {
    echo "Error: Número de cliente no proporcionado.";
}
?>
