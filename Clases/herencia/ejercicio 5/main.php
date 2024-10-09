<?php

require_once 'EmpleadoE.php';
require_once 'Gerente.php';
require_once 'Empresa.php';

// Crear empleados y gerente
$empleado1 = new Empleado('Juan', 'Pérez', 160, 15);
$empleado1->anyadirTelefono('123456789');
$empleado2 = new Empleado('María', 'Gómez', 120, 20);
$empleado2->anyadirTelefono('987654321');
$gerente = new Gerente('Ana', 'López', 3000);

// Crear empresa y añadir trabajadores
$empresa = new Empresa('Tech Solutions', 'Calle Ejemplo 123');
$empresa->anyadirTrabajador($empleado1);
$empresa->anyadirTrabajador($empleado2);
$empresa->anyadirTrabajador($gerente);

// Mostrar información
echo $empresa->listarTrabajadoresHtml();
echo "<h3>Coste Total de Nóminas: " . htmlspecialchars($empresa->getCosteNominas()) . "</h3>";

// Convertir a JSON
echo "<h3>Información en JSON:</h3>";
echo "<pre>" . htmlspecialchars($empresa->toJSON()) . "</pre>";

// Serializar
echo "<h3>Información serializada:</h3>";
echo "<pre>" . htmlspecialchars($empresa->toSerialize()) . "</pre>";
