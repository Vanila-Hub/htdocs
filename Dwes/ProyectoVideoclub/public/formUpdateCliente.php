<?php
session_start();
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

// Verifica si el usuario está logueado y si tiene permisos de administrador
if (!isset($_SESSION['usuario']) || !$_SESSION['isAdmin']) {
    header("Location: index.php");
    exit();
}

// Obtén el cliente a editar desde la sesión
$clienteId = $_GET['id'] ?? null; // Asegúrate de que este ID se pasa como parámetro en la URL
$cliente = $_SESSION['clientes'][$clienteId] ?? null;

if (!$cliente) {
    echo "Cliente no encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="updateCliente.php" method="post">
        <input type="hidden" name="clienteId" value="<?php echo htmlspecialchars($clienteId); ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($cliente->getNombre()); ?>" required>
        <br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($cliente->getUser()); ?>" required>
        <br><br>

        <label for="password">Contraseña (dejar en blanco para no cambiar):</label>
        <input type="password" id="password" name="password">
        <br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" value="<?php echo htmlspecialchars($cliente->getNumero()); ?>" min="1" required>
        <br><br>

        <label for="alquiler">Máximo Alquiler Concurrente:</label>
        <input type="number" id="alquiler" name="alquiler" value="<?php echo htmlspecialchars($cliente->getMaxAlquilerConcurrente()); ?>" min="1" required>
        <br><br>

        <button type="submit">Actualizar Cliente</button>
    </form>

    <a href="mainAdmin.php">Volver</a>
</body>
</html>
