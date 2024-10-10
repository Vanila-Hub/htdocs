<?php

abstract class Trabajador extends Persona {
    protected $telefonos = [];

    public function __construct($nombre, $apellidos, $edad = 0) {
        parent::__construct($nombre, $apellidos, $edad);
    }

    public function anyadirTelefono($telefono) {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): array {
        return $this->telefonos;
    }

    abstract public function calcularSueldo(): float; // Método abstracto
}
