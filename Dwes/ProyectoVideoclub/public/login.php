<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;
use Dwes\ProyectoVideoclub\app\Soporte;

session_start();

// Inicializa los clientes solo si no existen en la sesión
if (!isset($_SESSION['clientes'])) {
    // Inicializa los soportes
$soportes = [
    new Soporte('Star Wars', 1, 10),
    new Soporte('Matrix', 2, 15),
    new Soporte('FIFA 2022', 3, 60),
];

    $clientes = [
        new Cliente('Juan Perez', 1, 'juan', '1234', 3),
        new Cliente('Maria Lopez', 2, 'maria', '5678', 2),
        new Cliente('usuario', 3, "usuario", "usuario", 2),
        new Cliente('user', 4, "user", "user", 2),
    ];

      $clientes[0]->alquilar($soportes[0]);  
      $clientes[0]->alquilar($soportes[1]);  
      $clientes[1]->alquilar($soportes[2]);  

    // Convierte los objetos Cliente a JSON y los almacena en la sesión
    $_SESSION['clientes'] = array_map(function($cliente) {
        return $cliente->toJSON();
    }, $clientes);
}

if (isset($_POST['enviar'])) {
    $usuario = $_POST['inputUsuario'];
    $password = $_POST['inputPassword'];
    
    // Recupera los clientes de la sesión y los convierte de JSON a objetos Cliente
    $clientes = array_map(function($jsonCliente) {
        return Cliente::fromJSON($jsonCliente);
    }, $_SESSION['clientes']);
    
    if ($usuario === "admin" && $password === "admin") {
        $_SESSION['usuario'] = $clientes; 
        header("Location: mainAdmin.php");
        exit();
    } else {
        foreach ($clientes as $cliente) {
            if ($cliente->getUser() === $usuario && $cliente->getPassword() === $password) {
                // Almacena el cliente en la sesión para la página del cliente
                $_SESSION['usuario'] = $cliente->toJSON(); // Guardar el cliente como JSON
                header("Location: mainCliente.php");
                exit();
            }
        }

        // Mensaje de error si el login falla
        $_SESSION['error'] = "Usuario o contraseña no válidos!";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
