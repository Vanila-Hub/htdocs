<?php
include 'Trabajador.php';

class Gerente extends Trabajador {
    private $edad;
    private $sueldoBase;

    public function __construct($nombre, $apellidos, $edad, $sueldoBase) {
        parent::__construct($nombre, $apellidos);
        $this->edad = $edad;
        $this->sueldoBase = $sueldoBase;
    }

    public function calcularSueldo() {
        return $this->sueldoBase + ($this->sueldoBase * $this->edad / 100);
    }
}
?>