<?php
include 'Persona.php';

class Empleado extends PersonaH {
    private $sueldo;
    private $telefonos = [];

    public function __construct($nombre, $apellidos, $sueldo) {
        parent::__construct($nombre, $apellidos);
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

    public static function toHtml(PersonaH $p): string {
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
