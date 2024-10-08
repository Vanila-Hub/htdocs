<?php
include 'Tv.php';

$tv = new Tv(101, 'Samsung QLED', 'QLED 50"', 599.99, 50, 'QLED');

$tv->mostrarResumen();

$parentClass = get_parent_class($tv);
echo "Clase padre de Tv: " . $parentClass . "<br>";

if (is_subclass_of($tv, 'Producto')) {
    echo "Tv es una subclase de Producto.<br>";
} else {
    echo "Tv NO es una subclase de Producto.<br>";
}
?>
