<?php
require_once __DIR__ . '/../autoload.php';

use Dwes\ProyectoVideoclub\app\Cliente;

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$clienteID = isset($_GET['id']) ? $_GET['id'] : null;
$rol = isset($_GET['role']) ? $_GET['role'] : null;

if ($clienteID === null) {
    echo "Error: ID de cliente no proporcionado.";
    exit();
}

$usuarios = $_SESSION['usuario'];

if (is_string($usuarios)) {
    $usuarios = [Cliente::fromJSON($usuarios)];
} elseif (!is_array($usuarios)) {
    echo "Error: La sesión no contiene un array de usuarios.";
    exit();
}

$cliente = null;

foreach ($usuarios as $user) {
    if ($user instanceof Cliente && $user->getNumero() == $clienteID) {
        $cliente = $user;
        break;
    }
}

if ($cliente === null) {
    echo "Error: El cliente no existe o no es válido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #ff5722;
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #ffe0b2;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Dos columnas */
            grid-gap: 15px; /* Espaciado entre inputs */
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #e65100;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            padding: 10px;
            border: 1px solid #ffcc80;
            border-radius: 5px;
            transition: border 0.3s;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus {
            border: 1px solid #ff5722;
            outline: none;
        }

        button {
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            grid-column: span 2; /* Este botón ocupa toda la fila */
            margin-top: 10px;
        }

        button:hover {
            background-color: #e64a19;
        }

        a {
            text-decoration: none;
            color: #ff5722;
            font-weight: bold;
            text-align: center;
            grid-column: span 2; /* Este enlace ocupa toda la fila */
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Editar Datos del Cliente</h1>
    <div class="container">
        <form action="updateCliente.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($cliente->getNombre()); ?>" required>

            <label for="numero">Número de Cliente:</label>
            <input type="number" id="numero" name="numero" value="<?php echo htmlspecialchars($cliente->getNumero()); ?>" required>

            <label for="maxAlquilerConcurrente">Máximo Alquiler Concurrente:</label>
            <input type="number" id="maxAlquilerConcurrente" name="maxAlquilerConcurrente" value="<?php echo htmlspecialchars($cliente->getMaxAlquilerConcurrente()); ?>" required>

            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($cliente->getUser()); ?>" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($cliente->getPassword()); ?>" required>

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($cliente->getNumero()); ?>">
            <input type="hidden" name="role" value="<?php echo htmlspecialchars($rol); ?>">

            <button type="submit">Actualizar Cliente</button>
        </form>
        <a href="mainAdmin.php">Volver</a>
    </div>
</body>
</html>
