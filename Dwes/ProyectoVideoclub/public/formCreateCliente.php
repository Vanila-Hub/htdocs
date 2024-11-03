<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
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
    <h1>Crear Nuevo Cliente</h1>
    <form action="createCliente.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" min="1" required>

        <label for="alquiler">Máximo Alquiler Concurrente:</label>
        <input type="number" id="alquiler" name="alquiler" min="1" required>

        <button type="submit">Crear Cliente</button>
    </form>
    <br>
    <a href="mainAdmin.php">Volver</a>
</body>
</html>
