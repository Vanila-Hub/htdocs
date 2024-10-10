<?php

include 'Trabajador.php';
include 'EmpleadoE.php';
include 'Gerente.php';

$empleado = new Empleado("Juan", "Pérez", 40, 15.00); 
$empleado->anyadirTelefono("123456789");
$empleado->anyadirTelefono("987654321");

$gerente = new Gerente("Ana", "Gómez", 3000,18); 
$gerente->anyadirTelefono("555666777");

echo "<h2>Información del Empleado:</h2>";
echo $empleado->toHtml();

echo "<h2>Información del Gerente:</h2>";
echo $gerente->toHtml();
?>