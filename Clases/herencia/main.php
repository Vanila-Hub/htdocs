<?php
// Incluir la clase Tv
include 'Tv.php';

// Crear un objeto Tv
$tv = new Tv(101, 'Samsung QLED', 'QLED 50"', 599.99, 50, 'QLED');

// Llamar al método sobreescrito mostrarResumen()
$tv->mostrarResumen();
?>
