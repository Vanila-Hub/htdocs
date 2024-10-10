<?php

require_once 'Trabajador.php';

class Gerente extends Trabajador {
    private $sueldoBase;

    public function __construct($nombre, $apellidos, $sueldoBase, $edad) {
        parent::__construct($nombre, $apellidos);
        $this->sueldoBase = $sueldoBase;
        $this->edad = $edad;
    }

    public function calcularSueldo(): float {
        return $this->sueldoBase + ($this->sueldoBase * $this->edad / 100);
    }
    public function getEdad()
    {
        return $this->edad;
    }

    public function toHtml(): string {
        $html = "<p>Nombre Completo: " . htmlspecialchars($this->getNombreCompleto()) . "</p>";
        $html .= "<p>Sueldo: " . htmlspecialchars($this->calcularSueldo()) . "</p>";
        $html .= "<p>Teléfonos: ".htmlspecialchars($this->getEdad())."</p>";
        $html .= "<p>edad:. html.</p>";
        $html .= "<ol>";

        foreach ($this->listarTelefonos() as $telefono) {
            $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
        }

        $html .= "</ol>";
        return $html;
    }
}
