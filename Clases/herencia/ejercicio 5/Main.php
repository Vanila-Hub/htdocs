<?php

include 'Trabajador.php';
include 'EmpleadoE.php';
include 'Gerente.php';
include 'EmpresaE.php';

$empresa = new Empresa("Mi Empresa", "Calle Falsa 123");

$empleado1 = new Empleado("Juan", "Pérez", 40, 160, 20);
$empleado1->anyadirTelefono("123456789");
$empleado1->anyadirTelefono("987654321");

$empleado2 = new Empleado("Ana", "García", 35, 180, 25);
$empleado2->anyadirTelefono("111222333");

$gerente1 = new Gerente("Carlos", "Lopez", 3000, 10);
$gerente1->anyadirTelefono("444555666");

$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($empleado2);
$empresa->anyadirTrabajador($gerente1);

echo "<h1>Información de la Empresa</h1>";
echo "<p>Nombre: " . htmlspecialchars($empresa->getNombre()) . "</p>";
echo "<p>Dirección: " . htmlspecialchars($empresa->getDireccion()) . "</p>";
echo $empresa->listarTrabajadoresHtml();
echo "<p>Coste total en nóminas: " . htmlspecialchars($empresa->getCosteNominas()) . " €</p>";
?>