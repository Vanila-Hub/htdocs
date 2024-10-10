<?php
// Incluir las clases necesarias
include 'Trabajador.php'; 
include 'EmpleadoE.php';  
include 'Gerente.php';   

class Empresa {
    private $nombre;
    private $direccion;
    private $trabajadores = [];

    public function __construct($nombre, $direccion) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function anyadirTrabajador(Trabajador $t) {
        $this->trabajadores[] = $t;
    }

    public function listarTrabajadoresHtml(): string {
        $html = "<h2>Trabajadores de la Empresa</h2>";
        $html .= "<ul>";
        foreach ($this->trabajadores as $trabajador) {
            $html .= "<li>" . Trabajador::toHtml($trabajador) . "</li>";
        }
        $html .= "</ul>";
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
?>
