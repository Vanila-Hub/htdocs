<?php

require_once 'Trabajador.php';

class Empresa {
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
            $html .= $trabajador->toHtml(); // Cambiado para llamar al método toHtml de cada trabajador
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
}
