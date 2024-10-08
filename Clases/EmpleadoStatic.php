<?php
class Empleado
{
    private static $sueldoTope = 3000;

    public function __construct(
        protected string $nombreApellido,
        protected float $salario = 1000,
        protected array $telefonos = []
    ) {}

    public function getNombreCompleto(): string
    {
        return $this->nombreApellido;
    }

    public function getTelefonos(): array
    {
        return $this->telefonos;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->salario > self::$sueldoTope;
    }

    public function anyadirTelefono($telefono): void
    {
        $this->telefonos[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        return implode(", ", $this->telefonos);
    }

    public function vaciarTelefonos($numeroAvaciar): void
    {
        $this->telefonos = array_diff($this->telefonos, [(string)$numeroAvaciar]);
    }

    public static function toHtml(Empleado $emp): string
    {
        $html = "<p><strong>Nombre:</strong> " . $emp->getNombreCompleto() . "<br>";
        $html .= "<strong>Salario:</strong> " . $emp->salario . "<br>";
        $html .= "<strong>Teléfonos:</strong></p><ol>";

        foreach ($emp->getTelefonos() as $telefono) {
            $html .= "<li>" . $telefono . "</li>";
        }

        $html .= "</ol>";
        return $html;
    }
}

$empleado = new Empleado("Jose Luis", 2500, [943111640]);
$empleado->anyadirTelefono(943111649);
echo Empleado::toHtml($empleado);
?>
