<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

class Cliente {
    private $nombre;
    private $user;
    private $password;
    private $numero;
    private $maxAlquilerConcurrente;
    private $alquileres = array();

    public function __construct($nombre, $numero,$user,$password,$maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->user=$user;
        $this->password=$password;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    //Stter the user and password
    public function getUser(){ return $this->user;}
    public function getNombre(){ return $this->nombre;}
    public function getPassword(){return $this->password;}
    public function getMaxAlquilerConcurrente(){return $this->maxAlquilerConcurrente;}

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
    public function getAlquileres(): array{
        return $this->alquileres;
    }
        
        // Convierte el objeto a un formato JSON
        public function toJSON() {
            return json_encode([
                'nombre' => $this->nombre,
                'numero' => $this->numero,
                'user' => $this->user,
                'password' => $this->password,        
                'maxAlquilerConcurrente' => $this->maxAlquilerConcurrente,
                'soportesAlquilados' => $this->alquileres
            ]);
        }
    
        // Crea un objeto Cliente a partir de un JSON
        public static function fromJSON($jsonData) {
            $data = json_decode($jsonData, true);
            $cliente = new Cliente(
                $data['nombre'],
                $data['numero'],
                $data['user'],
                $data['password'],
                $data['maxAlquilerConcurrente']
            );
            $cliente->alquileres = $data['soportesAlquilados'];
            return $cliente;
        }
}
