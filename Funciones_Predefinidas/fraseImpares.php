<?php
    $frases="holamundo";
    for ($i=0; $i < strlen($frases); $i++) { 
        if ($i%2==0) {
        }else{
            echo "$frases[$i]";
        }
    }
?>