<?php
function peseta2euros(float $pesetas, float $cotizacion = 166.386): float {
    return $pesetas / $cotizacion;
}

function euros2pesetas(float $euros, float $cotizacion = 166.386): float {
    return $euros * $cotizacion;
}


$pesetas = 1000; 
$euros = peseta2euros($pesetas); 

echo "$pesetas pesetas son " . number_format($euros, 2) . " euros.<br>";

$euros = 10; 
$pesetas = euros2pesetas($euros); 


echo "$euros euros son " . number_format($pesetas, 2) . " pesetas.";


    
?>