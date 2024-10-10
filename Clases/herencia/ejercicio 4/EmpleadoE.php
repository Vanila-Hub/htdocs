<?php

require_once 'Trabajador.php';

class Empleado extends Trabajador {
    private $horasTrabajadas;
    private $precioPorHora;

    public function __construct($nombre, $apellidos, $horasTrabajadas, $precioPorHora) {
        parent::__construct($nombre, $apellidos);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->precioPorHora = $precioPorHora;
    }

    public function calcularSueldo(): float {
        return $this->horasTrabajadas * $this->precioPorHora;
    }

    // Implementar el método toHtml de forma compatible
    public function toHtml(): string {
        $html = "<p>Nombre Completo: " . htmlspecialchars($this->getNombreCompleto()) . "</p>";
        $html .= "<p>Sueldo: " . htmlspecialchars($this->calcularSueldo()) . "</p>";
        $html .= "<p>Teléfonos:</p>";
        $html .= "<ol>";

        // Obtener la lista de teléfonos
        $telefonos = $this->listarTelefonos();
        
        // Verificar si $telefonos es un array antes de iterar
        if (is_array($telefonos) && !empty($telefonos)) {
            foreach ($telefonos as $telefono) {
                $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
            }
        } else {
            $html .= "<li>No hay teléfonos disponibles.</li>"; // Mensaje si no hay teléfonos
        }
        
        $html .= "</ol>";
        return $html;
    }
}
