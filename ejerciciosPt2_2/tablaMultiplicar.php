<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $a = 7;
    $b = 0;
    $res=0;

    echo "<table border='1' cellpadding='10'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>a</th>";
    echo "<th>*</th>";
    echo "<th>b</th>";
    echo "<th>Res</th>";

    for ($i = 0; $i < 10; $i++) {
        $res = $a * $i;
        echo "<thead>";
        echo "<tr>";
        echo "<th>$a</th>";
        echo "<th>X</th>";
        echo "<th>$i</th>";
        echo "<th> $res </th>";
        echo "</tr>";
        echo "</thead>";
    }

    ?>
</body>

</html>