<?php
// Cargar autoload y luego iniciar la sesión
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Función para actualizar el cliente como usuario regular
function updateClientAsUser($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password) {
    // Obtener la lista de clientes desde la sesión
    $usuarios = array_map(function ($jsonCliente) {
        return Cliente::fromJSON($jsonCliente);
    }, $_SESSION['clientes']);

    $usuariosActualizados = [];

    // Recorrer cada cliente en la sesión
    foreach ($usuarios as $cliente) {
        if ($cliente instanceof Cliente) {
            // Verificar si este es el cliente que queremos actualizar
            if ($cliente->getNumero() == $clienteID) {
                // Actualizar los datos del objeto
                $cliente = new Cliente($nombre, $numero, $user, $password, $maxAlquilerConcurrente);
            }
        }
        // Agregar el cliente actualizado (como objeto)
        $usuariosActualizados[] = $cliente;
    }

    // Guardar la lista actualizada de usuarios en la sesión
    $_SESSION['clientes'] = array_map(function ($cliente) {
        return $cliente->toJSON();
    }, $usuariosActualizados);

    // Actualizar el cliente logueado en la sesión
    $_SESSION['usuario'] = $cliente->toJSON(); // Guardar el cliente logueado como JSON
}

// Función para actualizar el cliente como administrador
function updateClientAsAdmin($clienteID, $nombre, $numero, $maxAlquilerConcurrente, $user, $password) {
    // Obtener la lista de clientes desde la sesión
    $usuarios = $_SESSION['usuario']; // Assumes this contains all user objects
    $usuariosActualizados = [];

    // Recorrer cada cliente en la sesión
    foreach ($usuarios as $cliente) {
        // Verificar que sea un objeto Cliente
        if ($cliente instanceof Cliente) {
            // Verificar si este es el cliente que queremos actualizar
            if ($cliente->getNumero() == $clienteID) {
                // Actualizar los datos del objeto
                $cliente = new Cliente($nombre, $numero, $user, $password, $maxAlquilerConcurrente);
            }
        }
        // Agregar el cliente actualizado (como objeto)
        $usuariosActualizados[] = $cliente;
    }

    // Guardar la lista actualizada de usuarios en la sesión
    $_SESSION['usuario'] = $usuariosActualizados; // Assuming it keeps all users
}

// Verificar que se hayan enviado todos los datos necesarios
if (isset($_POST['id'], $_POST['nombre'], $_POST['numero'], $_POST['maxAlquilerConcurrente'], $_POST['user'], $_POST['password'], $_POST['role'])) {
    $clienteID = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $maxAlquilerConcurrente = $_POST['maxAlquilerConcurrente'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $rol = $_POST['role'];

    // Llamar a la función adecuada dependiendo del rol del usuario
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
