<?php
namespace Dwes\ProyectoVideoclub\app;

class Videoclub
{
    private $nombre;
    private $productos = array();
    private $numProductos = array();
    private $socios = array();
    private $numSocios;

    public function __construct($nombre__)
    {
        $this->nombre = $nombre__;
    }
    // $vc->incluirCintaVideo("Los cazafantasmas",6, 3.5, 107
    public function incluirCintaVideo($titulo_, $precio_, $numero_, $duracion_)
    {
        $nuevaCinta = new CintaVideo($titulo_, $precio_, $numero_, $duracion_);
        $this->incluirProducto($nuevaCinta);
    }

    // $vc->incluirDvd("Torrente",3, 4.5, "es","16:9");
    // $vc->incluirDvd("Origen",4, 4.5, "es,en,fr", "16:9")
    public function incluirDvd($titulo_, $precio_, $numero_, $idiomas_, $pantalla_)
    {
        $nuevoDvd = new Dvd($titulo_, $numero_, $precio_, $idiomas_, $pantalla_,);
        $this->incluirProducto($nuevoDvd);
    }

    //$vc->incluirJuego("God of War",1, 19.99, "PS4", 1, 1);
    // $vc->incluirJuego("The Last of Us Part II",2, 49.99, "PS4", 1, 1);
    public function incluirJuego($titulo_, $numero_, $precio_, $consola_, $minJ, $maxJ)
    {
        $nuevaConsola = new Juego($titulo_, $numero_, $precio_, $consola_, $minJ, $maxJ);
        $this->incluirProducto($nuevaConsola);
    }

    public function incluirSocio($nombre_, $numero_, $maxAlquilerConcurrente_ = 3)
    {
        $nuevoSocio = new Cliente($nombre_, $numero_, $maxAlquilerConcurrente_);
        array_push($this->socios, $nuevoSocio);
    }

    private function incluirProducto(Soporte $producto)
    {
        array_push($this->productos, $producto);
    }
    public function alquilarSocioProducto($numeroCliente_, $numeroSoporte)
    {
        foreach ($this->productos as $claveP => $product) {
            if ($product->getNumero() == $numeroSoporte) {
                foreach ($this->socios as $claveS => $socio) {
                    // if ( == $numeroCliente_) {
                    //     $socio->alquilar($product);
                    // }
                    $socio->getNumero()->alquilar($product);
                }
            }
        }
    }
    //to_string
    public function listarProductos()
    {
        foreach ($this->productos as $clave => $producto) {
            $producto->muestraResumen();
        }
    }
    public function listarSocios()
    {
        echo "<h1>Lista de Socios</h1>";
        echo "<ol>";
        foreach ($this->socios as $clave => $socio) {
            var_dump($socio);
            echo "<li>" . $socio->listarAlquileres() . "</li>";
        }
        echo "</ol>";
    }
}
