<?php

abstract class Trabajador {
    protected $nombre;
    protected $apellidos;
    protected $telefonos = [];

    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function addTelefono($telefono) {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos() {
        return implode(", ", $this->telefonos);
    }

    abstract public function calcularSueldo();
}
