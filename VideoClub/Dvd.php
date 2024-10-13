<?php
include_once ('Soporte.php');
class Dvd extends Soporte{
    public $idiomas;
    private $fromatPantalla;
    public function __construct($titulo_,$numero_,$precio_,$idiomas_,$fromatPantalla_)
    {
     parent::__construct($titulo_,$numero_,$precio_);
     $this->fromatPantalla=$fromatPantalla_;
     $this->idiomas=$idiomas_;
    }
    public function muestraResumen() {
        parent::muestraResumen();
        echo "<p>Soporte idoma: ".$this->idiomas." </p>";
        echo "<p>Soporte fromato de Pantalla: ".$this->fromatPantalla." </p>";
    }
}
?>