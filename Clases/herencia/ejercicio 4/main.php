<?php

require_once 'Trabajador.php';
require_once 'EmpleadoE.php';
require_once 'Gerente.php';
require_once 'Empresa.php';

// Crear instancias de empleados y gerente
$empleado1 = new Empleado("Juan", "Pérez", 160, 15);
$empleado1->anyadirTelefono("123456789");
$empleado1->anyadirTelefono("987654321");

$empleado2 = new Empleado("María", "Gómez", 150, 20);
$empleado2->anyadirTelefono("555666777");

$gerente = new Gerente("Ana", "López", 3000);
$gerente->anyadirTelefono("444555666");

// Crear la empresa y añadir trabajadores
$empresa = new Empresa("Tech Solutions", "Calle Falsa 123");
$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($empleado2);
$empresa->anyadirTrabajador($gerente);

// Generar el HTML de los trabajadores
$htmlTrabajadores = $empresa->listarTrabajadoresHtml();
$costeNominas = $empresa->getCosteNominas();

// Mostrar el informe
echo "<h1>Informe de la Empresa: " . htmlspecialchars($empresa->getNombre()) . "</h1>";
echo $htmlTrabajadores;
echo "<h3>Coste Total de Nóminas: " . htmlspecialchars($costeNominas) . "</h3>";

?>
