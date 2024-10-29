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

// Obtener el número del cliente a eliminar
$numeroCliente = $_GET['id'] ?? null;

if ($numeroCliente) {
    // Filtrar la lista de usuarios para eliminar el cliente
    $usuarios = $_SESSION['usuario'];
    
    // Aquí se asume que 'numero' es único para cada cliente
    foreach ($usuarios as $key => $usuario) {
        if ($usuario instanceof Cliente && $usuario->getNumero() == $numeroCliente) {
            unset($usuarios[$key]);
            break; // Salir del bucle una vez encontrado y eliminado el cliente
        }
    }
    
    // Reindexar el array para evitar huecos en los índices
    $_SESSION['usuario'] = array_values($usuarios);
}

// Redirigir de vuelta al listado de clientes
header("Location: mainAdmin.php");
exit();
