<?php
namespace Dwes\ProyectoVideoclub\Util;

use Exception;

class VideoclubException extends Exception{
    public function errorMessage(){
        return "VideoClub: ";
    }
}
?>