<?php
    $num = [];
    for ($i=0; $i <51 ; $i++) { 
        array_push($num,rand(0,33));
    }
    echo "el numero mayor es ", max($num);
    echo "<br> el numero meno es ", min($num);
    $suma=0;
    $numAn=0;
    foreach ($num as $key => $value) {
        $suma = $value + $numAn;
        $numAn = $value;
    }
    echo "<br> la media es ", count($num)/$suma;
?>