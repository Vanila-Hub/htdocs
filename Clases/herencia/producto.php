<?php
// Clase Producto
class Producto
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

    public function mostrarResumen()
    {
        echo "Código del producto: " . $this->codigo . "<br>";
    }
}
?>
