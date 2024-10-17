<?php
namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\app\Resumible;
abstract class Soporte implements Resumible
{
    public $titulo;
    public $alquilado;
    protected $numero;
    private $precio;
    private const IVA = 1.21;

    function __construct($titulo_, $numero_, $precio_)
    {
        $this->titulo = $titulo_;
        $this->precio = $precio_;
        $this->numero = $numero_;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function getPrecioConIva()
    {
        return $this->precio * self::IVA;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function muestraResumen()
    {
        $output = "
        <h1>Soporte con titulo:" . $this->titulo . " </h1>
        <p>Soporte con Numero:" . $this->getNumero() . " </p>
        <p>Soporte con precio:" . $this->precio . " </p>
        <p>Soporte con precio con IVA:" . $this->getPrecioConIva() . " </p>
        ";
        echo $output;
    }
}
