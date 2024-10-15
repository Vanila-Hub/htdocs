<?php
namespace CintaVideo;
 include_once('Soporte.php');
 use Soporte\Soporte as Soporte;
 
class CintaVideo extends Soporte{
    private $duracion;
    public function __construct($titulo_,$numero_,$precio_,$duracion_)
    {
        parent::__construct($titulo_,$numero_,$precio_);
        $this->duracion=$duracion_;
    }
    public function muestraResumen(){
        parent::muestraResumen();
        echo "<p>Mi duracion es: ".$this->duracion."</p>";
    }
}
?>