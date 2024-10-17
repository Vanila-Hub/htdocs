<?php
namespace Dwes\ProyectoVideoclub\Util;

use Exception;

class ClienteNoEncontradoException extends Exception{
    public function errorMessage(){
        return "Cliente Error: " . $this->getMessage();
    }
}
?>