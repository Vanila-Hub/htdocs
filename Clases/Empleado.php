<?php
class Empleado
{


    public function __construct(
        protected $nombreApellido,
        protected $salario=1000,
        protected $telefonos,
    ) {}

    public function getNombreCompleto()
    {
        return $this->nombreApellido;
    }

    public function debePagarImpuestos(): bool
    {
        if ($this->salario > 3000) {
            return true;
        } else {
            return false;
        }
    }

    public function anyadirTelefono($telefono)
    {
        array_push($this->telefonos, $telefono);
    }
    public function listarTelefonos(): string
    {
        return implode(",", $this->telefonos);
    }
    public function vaciarTelefonos($numeroAvaciar)
    {
        $this->telefonos = array_diff($this->telefonos, ["$numeroAvaciar"]);
    }
}

$empleado = new Empleado("Jose Luis",2500,943111640);
echo "el nombre completo del empkeado es", $empleado->getNombreCompleto(), "<br>";

if ($empleado->debePagarImpuestos()) {
    echo "y debe Pagar impuesto ";
} else {
    echo "y no debe Pagar impuesto ";
}
$empleado->anyadirTelefono(943111640);
$empleado->anyadirTelefono(943111649);
echo "mis numeros son", $empleado->listarTelefonos();
$empleado->vaciarTelefonos(943111649);
echo "mis numeros son", $empleado->listarTelefonos();
