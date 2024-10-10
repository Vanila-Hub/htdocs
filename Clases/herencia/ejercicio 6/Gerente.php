<?php

require_once 'Trabajador.php';
require_once 'JSerializable.php';

class Gerente extends Trabajador implements JSerializable {
    private $sueldoBase;

    public function __construct($nombre, $apellidos, $sueldoBase, $edad = 0) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldoBase = $sueldoBase;
    }

    public function calcularSueldo(): float {
        return $this->sueldoBase;
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

    public function toJSON(): string {
        $mapa = new stdClass();
        foreach ($this as $clave => $valor) {
            $mapa->$clave = $valor;
        }
        return json_encode($mapa);
    }

    public function toSerialize(): string {
        return serialize($this);
    }
}
