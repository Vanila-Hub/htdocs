<?php
namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\app\Soporte;

class CintaVideo extends Soporte {
    private $duracion;

    public function __construct($titulo_, $numero_, $precio_, $duracion_) {
        parent::__construct($titulo_, $numero_, $precio_);
        $this->duracion = $duracion_;
    }

    public function muestraResumen() {
        parent::muestraResumen();
        echo "<p>Mi duración es: " . $this->duracion . " minutos</p>";
    }
}
?>
