<?php
include 'PersonaE.php';

class Empleado extends PersonaE {
    private $sueldo;
    private $telefonos = [];

    public function __construct($nombre, $apellidos, $edad, $sueldo) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldo = $sueldo;
    }

    public function getSueldo() {
        return $this->sueldo;
    }

    public function setSueldo($sueldo) {
        $this->sueldo = $sueldo;
    }

    public function getTelefonos() {
        return $this->telefonos;
    }

    public function setTelefonos(array $telefonos) {
        $this->telefonos = $telefonos;
    }

    public function debePagarImpuestos(): bool {
        return $this-> getEdad() > 21 && $this->sueldo > 3333;
    }

    public function anyadirTelefono($telefono) {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }

    public static function toHtml(PersonaE $p): string {
        $html = parent::toHtml($p);
        if ($p instanceof Empleado) {
            $html .= "<p>Sueldo: " . htmlspecialchars($p->getSueldo()) . "</p>";
            $html .= "<p>Teléfonos:</p>";
            $html .= "<ol>";
            foreach ($p->getTelefonos() as $telefono) {
                $html .= "<li>" . htmlspecialchars($telefono) . "</li>";
            }
            $html .= "</ol>";
        }
        return $html;
    }
}
?>
