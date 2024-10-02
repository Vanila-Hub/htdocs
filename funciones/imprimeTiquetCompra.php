<?php
include 'euros.php';
function imprimir(){
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
    
        echo "<h1>Supermercado Severo</h1>";
        echo "<ul>";
    
        foreach ($compras as $item) {
            echo "<li>" . $item["nombre"] . " - " . $item["cantidad"] . " unidades - " 
                 . number_format($item["precioE"], 2) . " pesetas - " 
                 . number_format($item["precioP"], 2) . " €</li>";
        }
    
        echo "</ul>";
        echo "<p><strong>Total:</strong> " . number_format($totalPesetas, 2) . " pesetas - " 
             . number_format($totalEuros, 2) . " €</p>";
    
        echo "<footer>Tu supermercado de confianza</footer>";
    } else {
        echo "Error: La cantidad de productos no coincide con los datos recibidos.";
    }
}

?>
