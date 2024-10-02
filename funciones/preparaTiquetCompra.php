<?php
include 'euros.php';

$nombres = isset($_GET["nombres"]) ? $_GET["nombres"] : [];
$cantidades = isset($_GET["cantidades"]) ? $_GET["cantidades"] : [];
$costes = isset($_GET["costes"]) ? $_GET["costes"] : [];
$compras = [];
$totalPesetas = 0;
$totalEuros = 0;

if (count($nombres) === count($cantidades) && count($cantidades) === count($costes)) {
    for ($i = 0; $i < count($nombres); $i++) { 
        $precioP = euros2pesetas((float)$costes[$i]);
        $cantidad = (int)$cantidades[$i];

        $compra = [
            "nombre" => htmlspecialchars($nombres[$i]),
            "cantidad" => $cantidad,
            "precioP" => peseta2euros($precioP),
            "precioE" => $precioP
        ];
        $compras[] = $compra;

        $totalPesetas += $precioP * $cantidad;
        $totalEuros += $compra["precioP"] * $cantidad;
    }

    echo "<h1>Tiquet de Compra</h1>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio en Pesetas</th>
            <th>Precio en Euros</th>
          </tr>";

    foreach ($compras as $item) {
        echo "<tr>
                <td>" . $item["nombre"] . "</td>
                <td>" . $item["cantidad"] . "</td>
                <td>" . number_format($item["precioE"], 2) . " pesetas</td>
                <td>" . number_format($item["precioP"], 2) . " €</td>
              </tr>";
    }

    echo "<tr>
            <td colspan='2'><strong>Total:</strong></td>
            <td>" . number_format($totalPesetas, 2) . " pesetas</td>
            <td>" . number_format($totalEuros, 2) . " €</td>
          </tr>";

    echo "</table>";
} else {
    echo "Error: La cantidad de productos no coincide con los datos recibidos.";
}
?>
