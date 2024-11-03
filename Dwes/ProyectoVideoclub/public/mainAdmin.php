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
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4caf50; /* Verde kiwi */
        }

        .user-info {
            background-color: #ffffff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-info p {
            margin: 5px 0;
        }

        button {
            background-color: #4caf50; /* Verde kiwi */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Verde más oscuro al pasar el mouse */
        }

        a {
            color: #4caf50; /* Verde kiwi */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .videoclub-info {
            margin-top: 20px;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

    <?php
    foreach ($usuarios as $user) {
        if ($user instanceof Cliente) {
            echo '<div class="user-info">';
            echo "<h2>Usuario: " . htmlspecialchars($user->getUser()) . "</h2>";
            echo "<p>Nombre: " . htmlspecialchars($user->getNombre()) . "</p>";
            echo "<p>Número: " . htmlspecialchars($user->getNumero()) . "</p>";
            echo "<p>Máximo Alquiler Concurrente: " . htmlspecialchars($user->getMaxAlquilerConcurrente()) . "</p>";
            echo '<a href="formUpdateCliente.php?id=' . urlencode($user->getNumero()) . '&role=' . urlencode($userRole) . '"><button>Editar Cliente</button></a>';
            echo ' <a href="#" onclick="confirmDelete(' . htmlspecialchars($user->getNumero()) . ')">Eliminar</a>';
            echo '</div>';
        } else {
            echo "<p>Error: Usuario no válido.</p>";
        }
    }
    ?>

    <p>Pulsa <a href="logout.php">aquí</a> para cerrar la sesión.</p>

    <?php if (!empty($videoclub_datos)): ?>
        <div class="videoclub-info">
            <h2>Datos del Videoclub</h2>

            <h3>Soportes</h3>
            <ul>
                <?php foreach ($videoclub_datos['soportes'] as $soporte): ?>
                    <li><?php echo htmlspecialchars($soporte['titulo']) . " (" . htmlspecialchars($soporte['tipo']) . ") - Precio: " . htmlspecialchars($soporte['precio']); ?></li>
                <?php endforeach; ?>
            </ul>

            <h3>Socios</h3>
            <ul>
                <?php foreach ($videoclub_datos['socios'] as $socio): ?>
                    <li><?php echo htmlspecialchars($socio['nombre']) . " (ID: " . htmlspecialchars($socio['id']) . ")"; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <h1>Crear Nuevo Cliente</h1>
    <a href="createCliente.php">Crear Cliente</a>

</body>
</html>
