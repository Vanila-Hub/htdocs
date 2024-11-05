<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuarios = $_SESSION['usuario'];

if (is_array($usuarios) && isset($usuarios[0]) && is_object($usuarios[0]) && $usuarios[0] instanceof Cliente) {
} else {
    $usuarios = array_map(function($usuarioJSON) {
        return Cliente::fromJSON($usuarioJSON);
    }, (array)$_SESSION['usuario']);
}

$videoclub_datos = isset($_SESSION['soportes']) ? $_SESSION['soportes'] : [];
$userRole = "admin";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e0;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #e65100;
            text-align: center;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .user-info, .videoclub-info {
            background-color: #ffe0b2;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-info h2 {
            color: #d84315;
        }

        .user-info p, .videoclub-info h2 {
            margin: 5px 0;
        }

        button {
            background-color: #fb8c00;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 1em;
            display: inline-block;
            margin-top: 5px;
        }

        button:hover {
            background-color: #f57c00;
            transform: scale(1.05);
        }

        .delete-button {
            background-color: #2196F3;
        }

        .delete-button:hover {
            background-color: #1976D2;
        }

        a {
            color: #fb8c00;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .soporte-item {
            background-color: #ffe0b2;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .soporte-item h3 {
            color: #d84315;
            font-size: 1.2em;
            margin: 0;
        }

        .soporte-item p {
            margin: 5px 0;
            text-align: center;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.5em;
            }
            button {
                width: 100%;
            }
        }
    </style>
    <script>
        function confirmDelete(clienteNumero) {
            if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
                window.location.href = "removeCliente.php?numero=" + clienteNumero;
            }
        }
    </script>
</head>
<body>

    <h1>Bienvenido a tu panel de administración</h1>

    <div class="grid">
        <?php
        foreach ($usuarios as $user) {
            if ($user instanceof Cliente) {
                echo '<div class="user-info">';
                echo "<h2>Usuario: " . htmlspecialchars($user->getUser()) . "</h2>";
                echo "<p>Nombre: " . htmlspecialchars($user->getNombre()) . "</p>";
                echo "<p>Número: " . htmlspecialchars($user->getNumero()) . "</p>";
                echo "<p>Máximo Alquiler Concurrente: " . htmlspecialchars($user->getMaxAlquilerConcurrente()) . "</p>";
                echo '<a href="formUpdateCliente.php?id=' . urlencode($user->getNumero()) . '&role=' . urlencode($userRole) . '"><button>Editar Cliente</button></a>';
                echo ' <a href="#" onclick="confirmDelete(' . htmlspecialchars($user->getNumero()) . ')"><button class="delete-button">Eliminar</button></a>';
                
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
            } else {
                echo "<p>Error: Usuario no valido.</p>";
            }
        }
        ?>
    </div>

    <a href="createCliente.php"><button>Registrar nuevo cliente</button></a>
    <p>Pulsa <a href="logout.php">aqui</a> para cerrar la sesión.</p>

    <?php if (!empty($videoclub_datos)): ?>
        <div class="videoclub-info">
            <h2>Soportes disponibles en el Videoclub</h2>

            <div class="bento-grid">
                <?php foreach ($videoclub_datos as $soporte): ?>
                    <div class="soporte-item">
                        <h3><?php echo htmlspecialchars($soporte['titulo']); ?></h3>
                        <p>Tipo: <?php echo htmlspecialchars($soporte['tipo']); ?></p>
                        <p>Precio: <?php echo htmlspecialchars($soporte['precio']); ?>$</p>
                        <p>Duracion: <?php echo isset($soporte['duracion']) ? htmlspecialchars($soporte['duracion']) : 'N/A'; ?></p>
                        <p>Alquilado: <?php echo htmlspecialchars($soporte['alquilado'] ? 'Sí' : 'No'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <p>No hay soportes libres</p>
    <?php endif; ?>
</body>
</html>