<?php
// Función ucwords
// Convierte la primera letra de cada palabra en una cadena a mayúsculas.
$cadena1 = "hola mundo";
$cadena1_resultado = ucwords($cadena1);
echo "ucwords: " . $cadena1_resultado . "\n";  // Output: Hola Mundo


// Función strrev
// Devuelve la cadena original en orden inverso.
$cadena2 = "Hola Mundo";
$cadena2_resultado = strrev($cadena2);
echo "strrev: " . $cadena2_resultado . "\n";  // Output: odnuM aloH


// Función str_repeat
// Repite una cadena un número específico de veces.
$cadena3 = "Hola ";
$veces = 3;
$cadena3_resultado = str_repeat($cadena3, $veces);
echo "str_repeat: " . $cadena3_resultado . "\n";  // Output: Hola Hola Hola 


// Función md5
// Calcula el hash MD5 de una cadena. Útil para almacenar contraseñas de forma segura (no se recomienda para datos sensibles).
$cadena4 = "contraseña";
$cadena4_resultado = md5($cadena4);
echo "md5: " . $cadena4_resultado . "\n";  
?>
