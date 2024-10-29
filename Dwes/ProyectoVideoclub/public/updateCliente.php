<?php
// Asegúrate de que la clase Cliente esté cargada y de iniciar la sesión
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

// Obtener los datos del formulario
$clienteID = $_POST['clienteID'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$maxAlquilerConcurrente = $_POST['maxAlquilerConcurrente'];

// Buscar y actualizar el cliente en la sesión
if (isset($_SESSION['clientes'])) {
    foreach ($_SESSION['clientes'] as $cliente) {
        if ($cliente->getNumero() == $clienteID) {
            // Actualizar los datos del cliente
            $cliente->setNombre($nombre);
            $cliente->setNumero($numero);
            $cliente->setMaxAlquilerConcurrente($maxAlquilerConcurrente);
            break;
        }
    }
}

// Redirigir al listado de clientes después de la actualización
header("Location: main.php");
exit();
?>
