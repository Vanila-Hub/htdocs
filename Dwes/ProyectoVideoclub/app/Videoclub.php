<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;

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

    public function incluirDvd($titulo_, $precio_, $numero_, $idiomas_, $pantalla_)
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

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte)
    {
        foreach ($this->productos as $product) {
            if ($product->getNumero() == $numeroSoporte) {
                foreach ($this->socios as $socio) {
                    if ($socio->getNumero() == $numeroCliente) {
                        try {
                            $socio->alquilar($product);
                            $this->numProductosAlquilados++;
                            $this->numTotalAlquileres++;
                        } catch (SoporteYaAlquiladoException $e) {
                            echo "Error: " . $e->getMessage();
                        } catch (\Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                }
            }
        }
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
    {
        $disponibles = true;

        foreach ($numerosProductos as $numeroProducto) {
            foreach ($this->productos as $producto) {
                if ($producto->getNumero() == $numeroProducto && $producto->getAlquilado()) {
                    $disponibles = false;
                    break 2;
                }
            }
        }

        if ($disponibles) {
            foreach ($numerosProductos as $numeroProducto) {
                $this->alquilarSocioProducto($numSocio, $numeroProducto);
            }
        }
    }

    public function devolverSocioProducto(int $numSocio, int $numeroProducto)
    {
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() == $numSocio) {
                $socio->devolver($numeroProducto);
                return;
            }
        }
        throw new ClienteNoEncontradoException("El cliente no se encontró.");
    }

    public function devolverSocioProductos(int $numSocio, array $numerosProductos)
    {
        foreach ($numerosProductos as $numeroProducto) {
            $this->devolverSocioProducto($numSocio, $numeroProducto);
        }
    }

    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }
}
