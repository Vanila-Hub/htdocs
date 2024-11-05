<?php
require_once __DIR__ . '/../autoload.php';
use Dwes\ProyectoVideoclub\app\Cliente;
use Dwes\ProyectoVideoclub\app\CintaVideo;

session_start();

if (!isset($_SESSION['clientes'])) {
    $disponibles = [
        new CintaVideo('Star Wars', 1, 10, 120),
        new CintaVideo('Matrix', 2, 15, 136),
        new CintaVideo('FIFA 2022', 3, 60, 90),
    ];

    $listaClientes = [
        new Cliente('Carlos Martínez', 1, 'carlos', 'carlos', 4),
        new Cliente('Sofía Rodríguez', 2, 'sofia', 'sofia', 5),
        new Cliente('Andrés Gómez', 3, 'andres', 'andres', 3),
        new Cliente('Lucía Fernández', 4, 'lucia', 'lucia', 1),
    ];
    
    $listaClientes[0]->alquilar($disponibles[0]);  
    $listaClientes[0]->alquilar($disponibles[1]);  
    $listaClientes[1]->alquilar($disponibles[2]);  

    $_SESSION['clientes'] = array_map(function($cliente) {
        return $cliente->toJSON();
    }, $listaClientes);
}

if (isset($_POST['enviar'])) {
    $usuarioEntrante = $_POST['inputUsuario'];
    $claveEntrante = $_POST['inputPassword'];
    
    $clientesDeserializados = array_map(function($jsonCliente) {
        return Cliente::fromJSON($jsonCliente);
    }, $_SESSION['clientes']);
    
    if ($usuarioEntrante === "admin" && $claveEntrante === "admin") {
        $_SESSION['usuario'] = $clientesDeserializados; 
        $_SESSION['soportes'] = [
            ['titulo' => 'Ghost in the Shell', 'tipo' => 'Cinta Video', 'precio' => 100, 'duracion' => 120, 'alquilado' => false],
            ['titulo' => 'Matrix', 'tipo' => 'DVD', 'precio' => 15, 'idiomas' => 'Inglés, Español', 'pantalla' => '16:9', 'alquilado' => false],
            ['titulo' => 'FIFA 2022', 'tipo' => 'Juego', 'precio' => 60, 'consola' => 'PS5', 'minJugadores' => 1, 'maxJugadores' => 4, 'alquilado' => false]
        ];
        header("Location: mainAdmin.php");
        exit();
    } else {
        foreach ($clientesDeserializados as $cliente) {
            if ($cliente->getUser() === $usuarioEntrante && $cliente->getPassword() === $claveEntrante) {
                $disponiblesCliente = [
                    new CintaVideo('Star Wars', 1, 10, 120),
                    new CintaVideo('Matrix', 2, 15, 136),
                    new CintaVideo('FIFA 2022', 3, 60, 90),
                ];
                
                $_SESSION['usuario'] = $cliente->toJSON();
                $_SESSION['soportes'] = [
                    ['titulo' => 'Star Wars', 'tipo' => 'Cinta Video', 'precio' => 10, 'duracion' => 120, 'alquilado' => false],
                    ['titulo' => 'Matrix', 'tipo' => 'DVD', 'precio' => 15, 'idiomas' => 'Inglés, Español', 'pantalla' => '16:9', 'alquilado' => false],
                    ['titulo' => 'FIFA 2022', 'tipo' => 'Juego', 'precio' => 60, 'consola' => 'PS5', 'minJugadores' => 1, 'maxJugadores' => 4, 'alquilado' => false]
                ];
                header("Location: mainCliente.php");
                exit();
            }
        }

        $_SESSION['error'] = "Usuario o contraseña no válidos!";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
