<?php 
    $cantida = $_GET["original"];
    $numAnt=[];
    $res=0;

    for ($i=1; $i < $cantida +1 ; $i++) { 
        $can = 'cantidad'.$i;
        $num = $_GET[$can];
        array_push($numAnt,$num);
    }
    foreach ($numAnt as $key => $value) {
        $res = $res + $value;
    }
    echo "<br>res es = $res"
?>