<?php
    $num = [];
    for ($i=0; $i <51 ; $i++) { 
        array_push($num,rand(0,99));
    }
    foreach ($num as $key => $value) {
        echo "<ul><li>$value</li></ul>";
    }
?>