<?php

class Gerente extends Trabajador {
    private $sueldoBase;
    private $edad;

    public function __construct($nombre, $apellidos, $sueldoBase, $edad) {
        parent::__construct($nombre, $apellidos);
        $this->sueldoBase = $sueldoBase;
        $this->edad = $edad;
    }

    public function calcularSueldo(): float {
        return $this->sueldoBase + ($this->sueldoBase * $this->edad / 100);
    }

    public function toHtml(): string {
        $html = "<p>Nombre Completo: " . htmlspecialchars($this->getNombreCompleto()) . "</p>";
        $html .= "<p>Sueldo: " . htmlspecialchars($this->calcularSueldo()) . "</p>";
        $html .= "<p>Teléfonos:</p>";
        $html .= "<ol>";

        foreach ($this->listarTelefonos() as $telefono) {
            $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
        }

        $html .= "</ol>";
        return $html;
    }
}
?>
