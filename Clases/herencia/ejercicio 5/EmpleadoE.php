<?php

require_once 'Trabajador.php';
require_once 'JSerializable.php';

class Empleado extends Trabajador implements JSerializable {
    private $horasTrabajadas;
    private $precioPorHora;

    public function __construct($nombre, $apellidos, $horasTrabajadas, $precioPorHora, $edad = 0) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->precioPorHora = $precioPorHora;
    }

    public function calcularSueldo(): float {
        return $this->horasTrabajadas * $this->precioPorHora;
    }

    public function toHtml(): string {
        $html = "<p>Nombre Completo: " . htmlspecialchars($this->getNombreCompleto()) . "</p>";
        $html .= "<p>Sueldo: " . htmlspecialchars($this->calcularSueldo()) . "</p>";
        $html .= "<p>Teléfonos:</p>";
        $html .= "<ol>";

        $telefonos = $this->listarTelefonos();
        
        if (is_array($telefonos) && !empty($telefonos)) {
            foreach ($telefonos as $telefono) {
                $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
            }
        } else {
            $html .= "<li>No hay teléfonos disponibles.</li>";
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
