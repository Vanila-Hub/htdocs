<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $_edad = $_GET["edad"];
    $_ano = date("Y");
    echo "Tu edad es de  $_edad años, ";
    echo "en el año $_ano <br>";
    echo "Tu edad en 10 años sera de " . ($_edad + 10) . " años, ";
    echo "en el año ".($_ano +10). " <br>";
    echo "Tu edad hace 10 años era de " . ($_edad - 10) .  " años, ";
    echo "en el año ".($_ano - 10). " <br>";
    echo "Te jubilaras con " . ($_edad + 67) .  " años, ";
    echo "en el año ".($_ano + 67). " <br>";
    ?>
</body>

</html>