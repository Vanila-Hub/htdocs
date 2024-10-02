<?php
echo '
<style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: blue;
            color: white;
        }
        .row-header {
            background-color: orange;
            color: white;
        }
    </style>

    <table>
        <tr>
            <th>x</th>';

for ($i = 0; $i <= 10; $i++) {
    echo "<th>$i</th>";
}

echo '</tr>';

for ($i = 0; $i <= 10; $i++) {
    echo "<tr>";
    echo "<th class='row-header'>$i</th>";
    for ($j = 0; $j <= 10; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
}

echo '
    </table>

</body>';
?>
