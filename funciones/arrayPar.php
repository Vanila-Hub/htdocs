<?php
    function esPar(int $num) : bool{
            if ($num % 2 == 0) {
                return  true;
            }else{
                return false;
            }
    }

    function arrayAleatorio(int $tam,int $min, int $max) : array {
        $array_result=[];
        for ($i=0; $i < $tam ; $i++) { 
            $numeros = rand($min,$max);
            array_push($array_result,$numeros);
        }
        return $array_result;
    }
    $array = [];
    function arrayPares(array &$array): int {
        $pares =0;
        foreach ($array as $key => $value) {
            if (esPar($value)) {
                $pares++;
            }
        }
        return $pares;
    }    
?>