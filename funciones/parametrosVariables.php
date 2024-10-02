<?php
    function mayor(): int{
        $numero_args = func_num_args();
        if ($numero_args < 0) {
            return -1;
        }
        else{
            $valor_ant = 0;
            $numMayor = -1;

            for ($i=0; $i < $numero_args; $i++) { 
                $valor = func_get_args($i);
                if ($valor > $valor_ant) {
                   $numMayor = $valor_ant;
                }else {
                    $numMayor = $valor;
                }
                $valor_ant = $valor;
            }
            return $numMayor;
        }
    }

    function concatenar(...$palabras){
        return $palabras;
    }
?>