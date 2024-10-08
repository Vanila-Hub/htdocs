<?php
include 'Persona.php';

class Empleado extends Persona {
    private $sueldo;
    private $telefonos = [];
    private static $SUELDO_TOPE = 5000;

    public function __construct($nombre, $apellidos, $sueldo) {
        parent::__construct($nombre, $apellidos);
        $this->sueldo = $sueldo;
    }

    public function getSueldo():float {
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
        return $this->sueldo > self::$SUELDO_TOPE;
    }

    public function anyadirTelefono($telefono) {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos($numeroAvaciar) {
        $this->telefonos = array_diff($this->telefonos, [(string)$numeroAvaciar]);
    }

    public static function toHtml(Empleado $e): string {
        $html = "<p>Nombre: " . $e->getNombreCompleto() . "</p>";
        $html .= "<p>Sueldo: " . $e->getSueldo() . "</p>";
        $html .= "<p>Teléfonos:</p>";
        $html .= "<ol>";

        foreach ($e->getTelefonos() as $telefono) {
            $html .= "<li>$telefono</li>";
        }

        $html .= "</ol>";
        return $html;
    }
}
?>
