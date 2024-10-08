<?php
// Incluir la clase Producto
include 'Producto.php';

// Clase Tv que hereda de Producto
class Tv extends Producto
{
    public $pulgadas;
    public $tecnologia;

    public function __construct($codigo, $nombre, $nombreCorto, $PVP, $pulgadas, $tecnologia)
    {
        parent::__construct($codigo, $nombre, $nombreCorto, $PVP);
        $this->pulgadas = $pulgadas;
        $this->tecnologia = $tecnologia;
    }

    // Sobreescribir mostrarResumen() para incluir las propiedades de la TV
    public function mostrarResumen()
    {
        // Llamar al método mostrarResumen() de la clase Producto
        parent::mostrarResumen();
        
        // Mostrar las propiedades específicas de la TV
        echo "Pulgadas: " . $this->pulgadas . "<br>";
        echo "Tecnología: " . $this->tecnologia . "<br>";
    }
}
?>
