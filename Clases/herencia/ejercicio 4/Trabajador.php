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

    public function anyadirTelefono($telefono) {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): array {
        return $this->telefonos;
    }

    abstract public function calcularSueldo(): float; // Método abstracto
    abstract public function toHtml(): string; // Método abstracto
}
