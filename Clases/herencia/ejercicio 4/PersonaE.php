<?php
class PersonaE {
    protected $nombre;
    protected $apellidos;
    protected $edad;

    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public static function toHtml(PersonaE $p): string {
        $html = "<p>Nombre: " . htmlspecialchars($p->getNombreCompleto()) . "</p>";
        $html .= "<p>Edad: " . htmlspecialchars($p->getEdad()) . "</p>";
        return $html;
    }
}
?>
