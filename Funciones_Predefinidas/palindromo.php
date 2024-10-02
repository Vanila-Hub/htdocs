<?php
        $frase= "ana";
        $fraseA = trim($frase);
        $fraseb = strrev($fraseA);
        if ($fraseA===$fraseb) {
            echo "es palindroma";
        }else{
            echo "No es palindroma";
        }
?>