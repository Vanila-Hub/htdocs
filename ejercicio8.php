<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descomposición de Dinero</title>
</head>

<body>
    <h1>Descomposición de Maximo numero</h1>

    <?php
        $a = 0;
        $b = 3;
        $c = 11;
        function getMaximus($a,$b,$c) {
         return max($a,$b,$c);
        }
        
        $_maxValue= getMaximus($a,$b,$c);
        echo "el numero mayor entre $a,$b,$c es $_maxValue"
    ?>
</body>

</html>
