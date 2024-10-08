<?php
class PersonaH {
    protected $nombre;
    protected $apellidos;

    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public static function toHtml(PersonaH $p): string {
        $html = "<p>Nombre: " . htmlspecialchars($p->getNombreCompleto()) . "</p>";
        return $html;
    }
}
?>
