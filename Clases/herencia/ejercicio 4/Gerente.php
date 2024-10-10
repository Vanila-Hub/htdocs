<?php

require_once 'Trabajador.php';

class Gerente extends Trabajador {
    private $sueldoBase;

    public function __construct($nombre, $apellidos, $sueldoBase) {
        parent::__construct($nombre, $apellidos);
        $this->sueldoBase = $sueldoBase;
    }

    public function calcularSueldo(): float {
        return $this->sueldoBase; // Implementación simple, puedes añadir más lógica
    }

    public function toHtml(): string { // Cambiado para cumplir con la firma
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
