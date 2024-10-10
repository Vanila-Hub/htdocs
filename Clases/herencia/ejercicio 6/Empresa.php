<?php

require_once 'JSerializable.php';

class Empresa implements JSerializable {
    private $nombre;
    private $direccion;
    private $trabajadores = [];

    public function __construct($nombre, $direccion) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function anyadirTrabajador(Trabajador $t) {
        $this->trabajadores[] = $t;
    }

    public function listarTrabajadoresHtml(): string {
        $html = "<h2>Trabajadores de " . htmlspecialchars($this->nombre) . "</h2>";
        foreach ($this->trabajadores as $trabajador) {
            $html .= $trabajador->toHtml();
        }
        return $html;
    }

    public function getCosteNominas(): float {
        $total = 0;
        foreach ($this->trabajadores as $trabajador) {
            $total += $trabajador->calcularSueldo();
        }
        return $total;
    }

    public function toJSON(): string {
        $mapa = new stdClass();
        $mapa->nombre = $this->nombre;
        $mapa->direccion = $this->direccion;
        $mapa->trabajadores = $this->trabajadores; // Puedes agregar más detalles de los trabajadores si lo deseas
        return json_encode($mapa);
    }

    public function toSerialize(): string {
        return serialize($this);
    }
}
