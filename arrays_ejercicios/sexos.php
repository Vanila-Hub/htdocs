<?php
    $sexos =  [];
    for ($i=0; $i < 100; $i++) { 
        $sexos [] = rand(0,1)==1?"M":"F";
    }
    $contador = ['M'=>0,'F'=>0];
    foreach ($sexos as $key => $value) {
        $contador[$value]++;
    }
    echo "contador de M ".$contador['M'];
    echo "<br> contador de F ". $contador['F'];
?>