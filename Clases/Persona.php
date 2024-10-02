<?php
    class Persona {
        private $nombre;

        public function __construct($nombre){
            $this->nombre=$nombre;
        }

        public function getNombre (){
            return $this -> nombre;
        }
    }
    class MayorMenor {
        private $menor;
        private $mayor;

        public function setMayor($menor){
            $this->menor=$menor;
        }
        public function setMenor($mayor){
            $this->mayor=$mayor;
        }
        public function getMayor(){
            return $this->mayor;
        }
        public function getMenor(){
            return $this->menor;
        }
        
    }
    $persona = new Persona("jose");
?>