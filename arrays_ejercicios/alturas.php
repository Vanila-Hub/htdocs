<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
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

</body>

</html>

<?php
$personas = ["Guille" => 1.90, "Luis Fonsi" => 1.20];

echo "<table >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Altura (m)</th>
            </tr>
        </thead>
        <tbody>";
foreach ($personas as $key => $value) {
    echo "            <tr>
            <td>$key</td>
            <td>$value</td>
        </tr>  ";
}
$altura_media = array_sum($personas) / count($personas);
echo  "
            <tr>
                <td><strong>Altura Media</strong></td>
                <td><strong>$altura_media</strong></td>
            </tr>
        </tbody>
    </table>;"
?>