<?php
namespace Dwes\ProyectoVideoclub\Util;

use Exception;

class ClienteNoEncontradoException extends Exception{
    public function errorMessage(){
        return "<p>Cliente Error: " . $this->getMessage()."</p>";
    }
}
?>