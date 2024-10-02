<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $base=2;
        $expo=2;
        $resultado=0;
        for ($i=1; $i < $expo +1 ; $i++) {
            $resultado = ($base * $i);
        }
        echo "$resultado es";
    ?>
</body>
</html>