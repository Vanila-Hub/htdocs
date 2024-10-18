<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

class Cliente {
    private $nombre;
    private $numero;
    private $maxAlquilerConcurrente;
    private $alquileres = array();

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function alquilar(Soporte $producto) {
        if ($producto->getAlquilado()) {
            throw new SoporteYaAlquiladoException("El soporte ya está alquilado.");
        }
        if (count($this->alquileres) >= $this->maxAlquilerConcurrente) {
            throw new VideoclubException("Se ha alcanzado el máximo de alquileres concurrentes.");
        }
        $producto->setAlquilado(true);
        $this->alquileres[] = $producto;
        return $this; 
    }
    

    public function devolver($numeroProducto) {
        foreach ($this->alquileres as $key => $alquiler) {
            if ($alquiler->getNumero() == $numeroProducto) {
                $alquiler->setAlquilado(false);
                unset($this->alquileres[$key]);
                return $this;
            }
        }
        throw new SoporteNoEncontradoException("El soporte no se encontro en los alquilere");
    }
    

    public function getNumero() {
        return $this->numero;
    }

    public function listarAlquileres() {
        foreach ($this->alquileres as $alquiler) {
            echo $alquiler->muestraResumen();
        }
    }
}
