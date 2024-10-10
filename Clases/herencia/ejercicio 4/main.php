<?php
include 'EmpleadoE.php';
include 'Gerente.php';

$empleado = new Empleado("Juan", "Pérez", 40, 15);
echo "Nombre Completo: " . $empleado->getNombreCompleto() . "<br>";
echo "Sueldo del Empleado: " . $empleado->getSueldo() . "<br>";
$empleado->anyadirTelefono("123456789");
$empleado->anyadirTelefono("987654321");
echo "Teléfonos del Empleado: " . $empleado->listarTelefonos() . "<br><br>";

$gerente = new Gerente("María", "Gómez", 35, 3000);
echo "Nombre Completo: " . $gerente->getNombreCompleto() . "<br>";
echo "Sueldo del Gerente: " . $gerente->calcularSueldo() . "<br>";
$gerente->anyadirTelefono("123123123");
$gerente->anyadirTelefono("321321321");
echo "Teléfonos del Gerente: " . $gerente->listarTelefonos() . "<br>";
?>
