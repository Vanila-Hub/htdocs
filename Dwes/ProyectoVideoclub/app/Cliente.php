<?php
namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\app\Soporte;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\VideoclubException;

class Cliente
{
    public $nombre;
    private $numero;
    private $sopostesAlquilados = array();
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;

    // nombre, numero y maxAlquilerConcurrente
    public function __construct($nombre_, $numero_, $maxAlquilerConcurrente_ = 3)
    {
        $this->nombre = $nombre_;
        $this->numero = $numero_;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente_;
    }
    public function setNumero($numero_)
    {
        $this->numero = $numero_;
    }
    public function getNumero()
    {
        return $this;
    }
    public function setnumSoportesAlquilados()
    {
        $this->numSoportesAlquilados = count($this->sopostesAlquilados);
    }
    public function getnumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }
    public function muestraResumen()
    {
        echo "Nombre del Cliente:" . $this->nombre;
        echo "Cantidad de alquileres: " . $this->numSoportesAlquilados;
    }
    public function tieneAlquilado(Soporte $s): bool
    {
        return in_array($s, $this->sopostesAlquilados);
    }
    public function alquilar(Soporte $s): bool
    {
        if (in_array($s, $this->sopostesAlquilados)) {
            throw new SoporteYaAlquiladoException("Soporte no encontrado en los alquileres.");
            return false;
        } elseif ($this->maxAlquilerConcurrente >= $this->numSoportesAlquilados) {
            array_push($this->sopostesAlquilados, $s);
            $this->setnumSoportesAlquilados();
            echo "<p>Soporte alquilado con exito y actualizada numero de soportes alquilados a " . $this->numSoportesAlquilados . "</p>";
            return true;
        } else {
            throw new VideoclubException("Cupo de alquiler lleno");
            // echo "<p>Cupo de alquiler lleno ", $this->numSoportesAlquilados, "</p>";
            return false;
        }
    }
    public function devolver(int $numSoporte)
    {
        foreach ($this->sopostesAlquilados as $clave => $producto) {
            if ($producto->getNumero() == $numSoporte) {
                echo "<p>Soporte Devuelto " . $this->sopostesAlquilados[$clave]->titulo . "</p>";
                unset($this->sopostesAlquilados[$clave]);
                $this->setnumSoportesAlquilados();
                return $this;
            }
        }
        return $this;
    }
    public function listarAlquileres()
    {
        echo "<h1>  El cliente ". $this->nombre." tiene " .$this->numSoportesAlquilados . " soportes alqulados</h1>";
        $output = "<ol>";
        foreach ($this->sopostesAlquilados as $soport) {
            $output .= "<li>" . $soport->titulo . "</li>";
        }
        $output .= "</ol>";
        echo $output;
    }
}
