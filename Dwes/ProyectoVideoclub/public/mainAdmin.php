<?php
// Asegurarse de que la clase Cliente esté cargada
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

// Comprobar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Verificar si los usuarios ya están en formato de objeto Cliente
$usuarios = $_SESSION['usuario'];

if (is_array($usuarios) && is_object($usuarios[0]) && $usuarios[0] instanceof Cliente) {
    // Los datos ya están en formato de objeto Cliente, no es necesario convertir desde JSON
} else {
    // Convertir cada JSON en $_SESSION['usuario'] a un objeto Cliente
    $usuarios = array_map(function($usuarioJSON) {
        return Cliente::fromJSON($usuarioJSON);
    }, (array)$_SESSION['usuario']);
}

// Cargar los datos del videoclub si existen
$videoclub_datos = isset($_SESSION['soportes']) ? $_SESSION['soportes'] : [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <script>
        function confirmDelete(clienteNumero) {
            return confirm("¿Estás seguro de que deseas eliminar este cliente?");
        }
    </script>
</head>

<body>

    <?php
    // Mostrar la información de cada usuario
    foreach ($usuarios as $user) {
        echo "<h1>Bienvenido, " . htmlspecialchars($user->getUser()) . "</h1>";
        echo "<p>Nombre: " . htmlspecialchars($user->getNombre()) . "</p>";
        echo "<p>Número: " . htmlspecialchars($user->getNumero()) . "</p>";
        echo "<p>Pulsa <a href='removeCliente.php?id=" . htmlspecialchars($user->getNumero()) . "' onclick='return confirmDelete(" . htmlspecialchars($user->getNumero()) . ");'>aquí</a> para borrar el cliente.</p>";
        echo "<p>Pulsa <a href='formUpdateCliente.php?id=" . htmlspecialchars($user->getNumero()) . "'>aquí</a> para actualizar el cliente.</p>";
        echo "<p>Máximo Alquiler Concurrente: " . htmlspecialchars($user->getMaxAlquilerConcurrente()) . "</p>";
    }
    ?>

    <p>Pulsa <a href="logout.php">aquí</a> para cerrar la sesión.</p>

    <?php if (!empty($videoclub_datos)): ?>
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
    <?php endif; ?>
    
    <h1>Crear Nuevo Cliente</h1>
    <a href="createCliente.php">Crear Cliente</a>

</body>
</html>
