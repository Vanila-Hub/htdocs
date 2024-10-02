<?php
    $frases = "aa";
    $vocales = ['a', 'e', 'i', 'o', 'u'];

    $totaVocales = 0;
    $totaVocal = ["a" => 0, "e" => 0, "i" => 0, "o" => 0, "u" => 0];

    for ($i = 0; $i < strlen($frases); $i++) {    
        for ($j = 0; $j < count($vocales); $j++) { 
            if ($frases[$i] === $vocales[$j]) {
                $totaVocales++;
                $totaVocal[$frases[$i]]++;
            }
        }
    }

    echo "Hay $totaVocales vocales en '$frases'<br>";

    foreach ($totaVocal as $key => $value) {
        echo "$key => $value<br>";
    }
?>
