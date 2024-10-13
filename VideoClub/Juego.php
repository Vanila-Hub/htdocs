<?php
include_once 'Soporte.php';
class Juego extends Soporte{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;
    
    public function __construct($titulo_,$numero_,$precio_,$consola_,$minNumJugadores_,$maxNumJugadores_){
        parent::__construct($titulo_,$numero_,$precio_);
        $this->maxNumJugadores=$maxNumJugadores_;
        $this->minNumJugadores=$minNumJugadores_;
        $this->consola=$consola_;
    }

    public function muestraJugadoresPosibles(){
        $jugadoresActivos = $this->maxNumJugadores-$this->minNumJugadores;
        if ($jugadoresActivos == 1 || $jugadoresActivos == 0) {
            echo " Para un jugador";
        }elseif($jugadoresActivos < $this->maxNumJugadores){
            echo "De $jugadoresActivos a ".$this->maxNumJugadores." jugadores ";
        }
    }
    public function muestraResumen(){
        parent::muestraResumen();
        echo "<p>Sopote Consola:". $this->consola."</p>";
        echo "<p>Sopote minNumJugadores: ".$this->minNumJugadores."</p>";
        echo "<p>Sopote maxNumJugadores: ".$this->maxNumJugadores."</p>";
    }

}
?>