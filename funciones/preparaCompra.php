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
                "nombre" => ($nombres[$i]),
                "cantidad" => $cantidad,
                "precioP" => peseta2euros($precioP),
                "precioE" => $precioP
            ];
            $compras[] = $compra;
    
            $totalPesetas += $precioP * $cantidad;
            $totalEuros += $compra["precioP"] * $cantidad;
        }
    
        include ''
    }
    
?>