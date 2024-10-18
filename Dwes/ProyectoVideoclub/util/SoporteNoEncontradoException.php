<?php
namespace Dwes\ProyectoVideoclub\Util;

use Exception;

class SoporteNoEncontradoException extends Exception{
    public function errorMessage(){
        return "<p>Cliente Error: " . $this->getMessage()."</p>";
    }
}
?>