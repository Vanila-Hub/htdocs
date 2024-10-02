<?php
function quinigol() {
    $resultados = [];
    for ($i = 0; $i < 6; $i++) {
        $resultado = rand(0, 2) . rand(0, 2) . (rand(0, 1) ? 'M' : ''); // Genera [012M, 012M]
        $resultados[] = [$resultado, $resultado];
    }
    return $resultados;
}

function quiniela() {
    $resultados = [];
    for ($i = 0; $i < 14; $i++) {
        $resultado = rand(0, 2) . rand(0, 2) . (rand(0, 1) ? 'M' : ''); // Genera [012M, 012M]
        $resultados[] = $resultado; // Añade 1X2 resultados
    }
    $plenoAlQuince = rand(0, 2) . rand(0, 2); // Genera resultado para el pleno al quince
    $resultados[] = $plenoAlQuince;
    return $resultados;
}

function tabla(array $quiniela) {
    $html = '<table border="1">';
    $html .= '<tr><th>Partido</th><th>Resultado</th></tr>';
    foreach ($quiniela as $index => $resultado) {
        $html .= '<tr>';
        $html .= '<td>Partido ' . ($index + 1) . '</td>';
        $html .= '<td>' . $resultado . '</td>';
        $html .= '</tr>';
    }
    $html .= '</table>';
    return $html;
}

// Ejemplo de uso
$quinielaGenerada = quiniela();
echo tabla($quinielaGenerada);
?>
