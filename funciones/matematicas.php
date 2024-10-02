<?php 
function digitos(int $num): int {
    $numero = strval($num);
    return strlen($numero);
}

function digitoN(int $num, int $pos): int {
    $numeros = strval($num);
    return $numeros[$pos - 1];
}

function quitaPorDetras(int $num, int $cant): int {
    $numeros = strval($num);
    return (int) substr($numeros, 0, -$cant);
}

function quitaPorDelante(int $num, int $cant): int {
    $numeros = strval($num);
    return (int) substr($numeros, $cant);
}

$num = 123456;
$cantDetras = 3;
$cantDelante = 2;

$digitosTotal = digitos($num);
$digitoEnPos = digitoN($num, 4);
$resultadoDetras = quitaPorDetras($num, $cantDetras);
$resultadoDelante = quitaPorDelante($num, $cantDelante);

echo "Número: $num\n";
echo "Total de dígitos: $digitosTotal\n";
echo "Dígito en la posición 4: $digitoEnPos\n";
echo "Número después de quitar $cantDetras dígitos por detrás: $resultadoDetras\n";
echo "Número después de quitar $cantDelante dígitos por delante: $resultadoDelante\n";

$resultadoDetrasNombrados = quitaPorDetras(num: 987654, cant: 2);
$resultadoDelanteNombrados = quitaPorDelante(num: 987654, cant: 3);

echo "Número después de quitar 2 dígitos por detrás (simulado): $resultadoDetrasNombrados\n";
echo "Número después de quitar 3 dígitos por delante (simulado): $resultadoDelanteNombrados\n";
?>
