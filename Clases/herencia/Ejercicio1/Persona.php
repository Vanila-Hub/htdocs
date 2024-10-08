<?php
class Persona {
    protected $nombre;
    protected $apellidos;

    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }
}
?>
