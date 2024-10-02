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
        $i=1;
        do {
            $resultado = ($base * $i);
            $i++;
        } while ($i < $expo +1);

        echo "$resultado es"
    ?>
</body>
</html>