<?php
abstract class Producto
{
    public $codigo;
    public $nombre;
    public $nombreCorto;
    public $PVP;

    public function __construct($codigo, $nombre, $nombreCorto, $PVP)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->nombreCorto = $nombreCorto;
        $this->PVP = $PVP;
    }

    // Método abstracto
    abstract public function mostrarResumen();
}
?>
