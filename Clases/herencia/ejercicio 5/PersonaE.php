<?php

abstract class PersonaE {
    protected $nombre;
    protected $apellidos;
    protected $edad;

    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // Asegúrate de que el método tenga una implementación en Persona
    public function toHtml(): string {
        $html = "<p>Nombre: " . htmlspecialchars($this->getNombreCompleto()) . "</p>";
        $html .= "<p>Edad: " . htmlspecialchars($this->getEdad()) . "</p>";
        return $html;
    }
}
