<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h2>Lista de Contactos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Altura (m)</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listContactos = [
                "Jose Luis" => ["altura" => 1.90, "email" => "Luisitocomunic@gmail.com"],
                "Victor Blaze" => ["altura" => 2.90, "email" => "Luisitocomunic@gmail.com"],
                "Marck Evans" => ["altura" => 1.60, "email" => "megustaelfutbol@gmail.com"]
            ];

            foreach ($listContactos as $nombre => $info) {  
                echo "<tr>
                        <td>$nombre</td>
                        <td>{$info['altura']}</td>
                        <td>{$info['email']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>