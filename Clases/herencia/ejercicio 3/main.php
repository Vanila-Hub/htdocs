<?php
include 'EmpleadoE.php';

$empleado = new Empleado("Juan", "Perez", 25, 4000);
$empleado->anyadirTelefono("123456789");
$empleado->anyadirTelefono("987654321");

echo Empleado::toHtml($empleado);

if ($empleado->debePagarImpuestos()) {
    echo "<p>Debe pagar impuestos.</p>";
} else {
    echo "<p>No debe pagar impuestos.</p>";
}
?>
