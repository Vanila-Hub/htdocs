<?php
include 'Empleado.php';
include 'Gerente.php';
include 'Empresa.php';

$empleado1 = new Empleado("Juan", "Pérez", 25, 3000);
$empleado2 = new Empleado("Ana", "García", 30, 3500);
$gerente1 = new Gerente("Carlos", "López", 45, 5000);

$empresa = new Empresa("Tech Solutions", "Calle Falsa 123");

$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($empleado2);
$empresa->anyadirTrabajador($gerente1);

echo $empresa->listarTrabajadoresHtml();

echo "El coste total en nóminas es: " . $empresa->getCosteNominas();
?>
