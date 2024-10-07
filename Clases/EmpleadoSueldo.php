<?php
class Empleado
{
    public function __construct(
        protected $nombreApellido,
        protected $salario = 1000,
        protected $telefonos = []
        ) {}
        
        const SUELDO_TOPE = 200;
        public function getNombreCompleto()
        {
            return $this->nombreApellido;
        }
        
        public function debePagarImpuestos(): bool
        {
            return $this->salario > self::SUELDO_TOPE;
        }
        
    public function anyadirTelefono($telefono)
    {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos($numeroAvaciar)
    {
        $this->telefonos = array_diff($this->telefonos, [(string)$numeroAvaciar]);
    }
}

$empleado = new Empleado("Jose Luis", 2500, [943111640]);
echo "El nombre completo del empleado es: " . $empleado->getNombreCompleto() . "<br>";

if ($empleado->debePagarImpuestos()) {
    echo "Debe pagar impuestos. <br>";
} else {
    echo "No debe pagar impuestos. <br>";
}

$empleado->anyadirTelefono(943111649);
echo "Mis números son: " . $empleado->listarTelefonos() . "<br>";

$empleado->vaciarTelefonos(943111649);
echo "Después de vaciar, mis números son: " . $empleado->listarTelefonos() . "<br>";
?>
