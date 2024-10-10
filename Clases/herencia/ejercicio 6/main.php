<?php
include 'Empleado.php';
include 'Gerente.php';
include 'Empresa.php';

$empresa = new Empresa("Mi Empresa", "Calle Falsa 123");

$empleado1 = new Empleado("Juan", "Pérez", 40, 20);
$empleado1->anyadirTelefono("123456789");
$empleado1->anyadirTelefono("987654321");

$empleado2 = new Empleado("Ana", "García", 35, 25);
$empleado2->anyadirTelefono("111222333");

$gerente1 = new Gerente("Carlos", "Lopez", 3000, 10);
$gerente1->anyadirTelefono("444555666");

$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($empleado2);
$empresa->anyadirTrabajador($gerente1);

echo "<h1>Información de la Empresa</h1>";
echo $empresa->listarTrabajadoresHtml();
echo "Coste total de nóminas: " . $empresa->getCosteNominas() . "<br>";
echo "JSON de la empresa: " . $empresa->toJSON() . "<br>";
echo "Serialized de la empresa: " . $empresa->toSerialize() . "<br>";
?>
