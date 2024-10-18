<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;

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
            throw new \Exception("Se ha alcanzado el máximo de alquileres concurrentes.");
        }
        $producto->setAlquilado(true);
        $this->alquileres[] = $producto;
        return $this; // Permite el encadenamiento
    }

    public function devolver($numeroProducto) {
        foreach ($this->alquileres as $key => $alquiler) {
            if ($alquiler->getNumero() == $numeroProducto) {
                $alquiler->setAlquilado(false);
                unset($this->alquileres[$key]);
                return $this; // Permite el encadenamiento
            }
        }
        throw new SoporteNoEncontradoException("El soporte no se encontró en los alquileres.");
    }

    public function getNumero() {
        return $this->numero;
    }

    public function listarAlquileres() {
        foreach ($this->alquileres as $alquiler) {
            echo $alquiler->muestraResumen(); // Llama al método de resumen de Soporte
        }
    }
}
