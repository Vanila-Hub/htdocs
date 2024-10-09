<?php
include 'Empleado.php';

$empleado = new Empleado("Juan", "Pérez", 5500);

echo "Nombre Completo: " . $empleado->getNombreCompleto() . "<br>";

echo "Sueldo: " . $empleado->getSueldo() . "<br>";

if ($empleado->debePagarImpuestos()) {
    echo "El empleado debe pagar impuestos.<br>";
} else {
    echo "El empleado no debe pagar impuestos.<br>";
}

$empleado->anyadirTelefono("123456789");
$empleado->anyadirTelefono("987654321");

echo "Teléfonos: " . $empleado->listarTelefonos() . "<br>";

$empleado->vaciarTelefonos("123456789");

echo "Teléfonos después de vaciar uno: " . $empleado->listarTelefonos() . "<br>";

echo Empleado::toHtml($empleado);
?>
