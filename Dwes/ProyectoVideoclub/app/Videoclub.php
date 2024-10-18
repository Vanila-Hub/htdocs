<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

class Videoclub
{
    private $nombre;
    private $productos = array();
    private $socios = array();
    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }


    public function incluirCintaVideo($titulo_, $precio_, $numero_, $duracion_)
    {
        $nuevaCinta = new CintaVideo($titulo_, $precio_, $numero_, $duracion_);
        $this->incluirProducto($nuevaCinta);
    }

    public function incluirDvd($titulo_,$numero_,$precio_, $idiomas_, $pantalla_)
    {
        $nuevoDvd = new Dvd($titulo_, $numero_, $precio_, $idiomas_, $pantalla_);
        $this->incluirProducto($nuevoDvd);
    }

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

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {
        foreach ($this->productos as $product) {
            if ($product->getNumero() == $numeroSoporte) {
                foreach ($this->socios as $socio) {
                    if ($socio->getNumero() == $numeroCliente) {
                        try {
                            $socio->alquilar($product);
                            $this->numProductosAlquilados++;
                            $this->numTotalAlquileres++;
                        } catch (SoporteYaAlquiladoException $e) {
                            echo  $e->getMessage();
                        } catch (VideoclubException $e) {
                            echo  $e->getMessage();
                        } catch (SoporteNoEncontradoException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
            }
        }
    }
    

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos) {
        try {
            foreach ($numerosProductos as $numeroProducto) {
                $productoEncontrado = false;
    
                foreach ($this->productos as $producto) {
                    if ($producto->getNumero() == $numeroProducto) {
                        $productoEncontrado = true;
                        if ($producto->getAlquilado()) {
                            throw new VideoclubException("<h1>El producto con nombre ".$producto->titulo." ya está alquilado.</h1> ");
                        } else {
                            $this->alquilarSocioProducto($numSocio, $numeroProducto);
                        }
                    }
                }
    
                if (!$productoEncontrado) {
                    throw new VideoclubException("El producto con número $numeroProducto no existe en el videoclub.");
                }
            }
    
        } catch (VideoclubException $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function devolverSocioProducto(int $numSocio, int $numeroProducto) {
        try {
            foreach ($this->socios as $socio) {
                if ($socio->getNumero() == $numSocio) {
                    $socio->devolver($numeroProducto);
                    return $this;
                }
            }
            throw new ClienteNoEncontradoException("El cliente no se encontró.");
        } catch (ClienteNoEncontradoException $e) {
            echo $e->getMessage();
        } catch(SoporteNoEncontradoException $s){
            echo $s->getMessage();
        }
    }
    

    public function devolverSocioProductos(int $numSocio, array $numerosProductos) {
        foreach ($numerosProductos as $numeroProducto) {
            $this->devolverSocioProducto($numSocio, $numeroProducto);
        }
        return $this;
    }
    

    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

     //to_string
     public function listarProductos() {
        foreach ($this->productos as $clave => $producto) {
            $producto->muestraResumen();
        }
    }
    public function listarSocios() {
        echo "<h1>Lista de Socios</h1>";
        echo "<ol>";
        foreach ($this->socios as $clave => $socio) {
            echo "<li>".$socio->listarAlquileres()."</li>";
        }
        echo "</ol>";
    }
}
