<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$cliente = $_SESSION['usuario']; // Aquí se supone que has guardado un solo cliente en la sesión

echo "<h1>Bienvenido, " . $cliente->getNombre() . "</h1>";

echo "<h2>Listado de Alquileres:</h2>";
if (empty($cliente->getAlquileres())) {
    echo "<p>No tienes alquileres en este momento.</p>";
} else {
    echo "<ul>";
    foreach ($cliente->getAlquileres() as $alquiler) {
        echo "<li>" . $alquiler->muestraResumen() . "</li>"; // Se supone que hay un método muestraResumen() en el objeto Soporte
    }
    echo "</ul>";
}
