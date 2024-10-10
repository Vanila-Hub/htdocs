<?php

include 'JSerializable.php';

class Empresa implements JSerializable {
    private $nombre;
    private $direccion;
    private $trabajadores = [];  

    public function __construct($nombre, $direccion) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function anyadirTrabajador(Trabajador $t): void {
        $this->trabajadores[] = $t;
    }

    
    public function getCosteNominas(): float {
        $total = 0.0;
        foreach ($this->trabajadores as $trabajador) {
            $total += $trabajador->calcularSueldo();
        }
        return $total;
    }
    
    public function getNombre(): string {
        return $this->nombre;
    }
    
    public function getDireccion(): string {
        return $this->direccion;
    }
    
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }
    public function listarTrabajadoresHtml(): string {
        $html = "<h3>Lista de Trabajadores:</h3><ol>";
        foreach ($this->trabajadores as $trabajador) {
            $html .= "<li>" . $trabajador->toHtml() . "</li>";
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
?>
