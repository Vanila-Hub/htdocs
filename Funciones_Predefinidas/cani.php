<?php
    $frase= "Juan tiene dos cazuelas";
    $antesCani = trim($frase);
    $fraseCani = "";

    for ($i=0; $i < strlen($antesCani); $i++) { 
        if ($i % 2==0) {
           $fraseCani .= strtoupper($antesCani[$i]);
        } else {
            $fraseCani .= $antesCani[$i];
        }
    }
    echo "$fraseCani";
?>