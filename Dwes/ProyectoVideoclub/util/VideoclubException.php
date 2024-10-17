<?php
namespace Dwes\ProyectoVideoclub\Util;

use ErrorException;
use Exception;

class VideoclubException extends Exception{
    public function errorMessage(){
        return "VideoClub: ". $this->getMessage();
    }
}
?>