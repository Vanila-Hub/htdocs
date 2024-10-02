<?php
    $frase = "juan tiene una cazuela";
    $letrasTotales=0;
    $fraseExplotada = explode(" ",$frase);

    echo "Analizando la frase $frase <br>";
    for ($i=0; $i < count($fraseExplotada); $i++) { 
        $letrasTotales = strlen($fraseExplotada[$i]);
        echo "$fraseExplotada[$i] tiene $letrasTotales letras totales <br>" ;
    }
    echo "las palabras totales de $frase son de ", count($fraseExplotada);
?>