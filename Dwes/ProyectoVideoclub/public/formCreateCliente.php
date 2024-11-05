<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
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
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #ffe0b2;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 15px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            grid-column: span 2; /* Para que el formulario ocupe el espacio completo */
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #e65100;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid #ffcc80;
            border-radius: 10px;
            background-color: #fff3e0;
            transition: border 0.3s, background-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus {
            border: 2px solid #ff5722;
            background-color: #ffe0b2;
            outline: none;
        }

        button {
            background-color: #ff5722;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            grid-column: span 2; /* Para que el botón ocupe toda la fila */
        }

        button:hover {
            background-color: #e64a19;
        }

        a {
            text-decoration: none;
            color: #ff5722;
            font-weight: bold;
            grid-column: span 2; /* Para que el enlace ocupe toda la fila */
            margin-top: 10px;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Crear Nuevo Cliente</h1>
    <div class="container">
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
        <a href="mainAdmin.php">Volver</a>
    </div>
</body>
</html>
