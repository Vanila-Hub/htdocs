<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuarios = $_SESSION['usuario'];

if (is_array($usuarios) && is_object($usuarios[0]) && $usuarios[0] instanceof Cliente) {
} else {
    $usuarios = array_map(function($usuarioJSON) {
        return Cliente::fromJSON($usuarioJSON);
    }, (array)$_SESSION['usuario']);
}

$videoclub_datos = isset($_SESSION['soportes']) ? $_SESSION['soportes'] : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página del Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e0; /* Fondo suave naranja */
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #ff5722; /* Naranja brillante */
            margin-bottom: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .client-info {
            background-color: #ffe0b2; /* Fondo naranja claro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .client-info:hover {
            transform: scale(1.02); /* Aumenta el tamaño al pasar el mouse */
        }

        button {
            background-color: #ff5722; /* Naranja brillante */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e64a19; /* Naranja más oscuro al pasar el mouse */
        }

        a {
            color: #ff5722; /* Naranja brillante */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .videoclub-info {
            margin-top: 20px;
            background-color: #fff3e0; /* Fondo suave naranja */
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h1>Bienvenido a tu página, <?php echo htmlspecialchars($usuarios[0]->getNombre()); ?></h1>

    <div class="container">
        <?php
        foreach ($usuarios as $user) {
            echo '<div class="client-info">';
            echo "<h2>Información del Cliente</h2>";
            echo "<p>Nombre: " . htmlspecialchars($user->getNombre()) . "</p>";
            echo "<p>Número: " . htmlspecialchars($user->getNumero()) . "</p>";
            echo "<p>Máximo Alquiler Concurrente: " . htmlspecialchars($user->getMaxAlquilerConcurrente()) . "</p>";
            echo '<a href="formUpdateCliente.php?id=' . urlencode($user->getNumero()) . '"><button>Editar Mis Datos</button></a>';
            
            echo "<h3>Alquileres:</h3>";
            $alquileres = $user->getAlquileres(); 
            if (!empty($alquileres)) {
                echo "<ul>";
                foreach ($alquileres as $alquiler) {
                    echo "<li>" . htmlspecialchars($alquiler['titulo']) . " (Alquilado: " . ($alquiler['alquilado'] ? 'Sí' : 'No') . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No hay alquileres.</p>";
            }

            echo '</div>';
        }
        ?>
    </div>

    <p>Pulsa <a href="logout.php">aquí</a> para cerrar la sesión.</p>

</body>
</html>
