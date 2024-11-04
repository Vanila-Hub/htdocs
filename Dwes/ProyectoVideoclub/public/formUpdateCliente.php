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
            background-color: #f9f9f9;
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
            color: #4caf50; /* Color verde kiwi */
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus {
            border: 1px solid #4caf50; /* Color verde kiwi */
            outline: none;
        }

        button {
            background-color: #4caf50; /* Color verde kiwi */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049; /* Un verde un poco más oscuro al pasar el mouse */
        }

        a {
            text-decoration: none;
            color: #4caf50; /* Color verde kiwi */
            margin-top: 10px;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Editar Datos del Cliente</h1>
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

    <p><a href="mainAdmin.php">Volver a la página principal</a></p>
</body>
</html>
