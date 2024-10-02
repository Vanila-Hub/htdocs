<?php

function generarLetraAleatoria() {
    $mayuscula = rand(0, 1);
    
    if ($mayuscula) {
        return chr(rand(65, 90)); 
    } else {
        return chr(rand(97, 122)); 
    }
}

$letraAleatoria = generarLetraAleatoria();
echo "Letra aleatoria generada: $letraAleatoria\n";
?>
