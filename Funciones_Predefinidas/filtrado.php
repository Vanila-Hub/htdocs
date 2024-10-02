<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST["numeros"];

    $numeros = str_replace(',', ' ', $numeros);  
    $array_numeros = explode(" ", $numeros);

    $array_numeros_validos = array_filter($array_numeros, 'is_numeric');

    $numeros_pares = array_filter($array_numeros_validos, function($num) {
        return $num % 2 == 0;
    });

    $cantidad_pares = count($numeros_pares);

    echo "Dame números: $numeros<br>"; // Mostrar la entrada original

    if ($cantidad_pares > 0) {
        echo "Los $cantidad_pares números pares son: " . implode(" ", $numeros_pares);
    } else {
        echo "No se encontraron números pares.";
    }
}
?>
