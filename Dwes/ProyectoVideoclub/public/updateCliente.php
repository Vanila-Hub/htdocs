<?php
/**
 * Este script se encarga de actualizar la información de un cliente en la sesión.
 * 
 * - Se inicia la sesión y se comprueba si el usuario está logueado.
 * - Se definen dos funciones: una para actualizar a un cliente como usuario regular y otra como administrador.
 * - Ambas funciones obtienen la lista de clientes desde la sesión, actualizan los datos del cliente correspondiente y 
 *   almacenan la lista actualizada en la sesión.
 * - Se verifica si se han enviado todos los datos necesarios mediante un formulario.
 * - Dependiendo del rol del usuario, se llama a la función adecuada para actualizar al cliente y redirigir a la página correspondiente.
 * - Si faltan datos, se muestra un mensaje de error.
 */

require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

function updateClientAsUser($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password) {
    $usuarios = array_map(function ($jsonCliente) {
        return Cliente::fromJSON($jsonCliente);
    }, $_SESSION['clientes']);

    $usuariosActualizados = [];

    foreach ($usuarios as $cliente) {
        if ($cliente instanceof Cliente) {
            if ($cliente->getNumero() == $clienteID) {
                $cliente = new Cliente($nombre, $numero, $user, $password, $maxAlquilerConcurrente);
            }
        }
        $usuariosActualizados[] = $cliente;
    }

    $_SESSION['clientes'] = array_map(function ($cliente) {
        return $cliente->toJSON();
    }, $usuariosActualizados);

    $_SESSION['usuario'] = $cliente->toJSON();
}

function updateClientAsAdmin($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password) {
    $usuarios = $_SESSION['usuario'];
    $usuariosActualizados = [];

    foreach ($usuarios as $cliente) {
        if ($cliente instanceof Cliente) {
            if ($cliente->getNumero() == $clienteID) {
                $cliente = new Cliente($nombre, $numero, $user, $password, $maxAlquilerConcurrente);
            }
        }
        $usuariosActualizados[] = $cliente;
    }

    $_SESSION['usuario'] = $usuariosActualizados;
}

if (isset($_POST['id'], $_POST['nombre'], $_POST['numero'], $_POST['maxAlquilerConcurrente'], $_POST['user'], $_POST['password'], $_POST['role'])) {
    $clienteID = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $maxAlquilerConcurrente = $_POST['maxAlquilerConcurrente'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $rol = $_POST['role'];

    if ($rol !== "admin") {
        updateClientAsUser($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password);
        header("Location: mainCliente.php");
    } else {
        updateClientAsAdmin($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password);
        header("Location: mainAdmin.php");
    }
    
    exit();
} else {
    echo "Error: Datos incompletos.";
}
?>
