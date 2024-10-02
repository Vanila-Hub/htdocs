<?php 
    $fila = $_GET["fila"];
    $columna = $_GET["columna"];

    echo "<table border='1'>";

    for ($i = 1; $i < $fila; $i++) { 
        echo "<tr>";
        for ($j = 1; $j < $columna; $j++) {
            echo "<td>$i,$j</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
?>
