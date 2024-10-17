<?php
namespace Dwes\ProyectoVideoclub\Util;

use Exception;

class SoporteYaAlquiladoException extends Exception{
    public function errorMessage(){
        return "Soporte: ";
    }
}
?>