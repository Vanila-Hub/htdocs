<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descomposición de Dinero</title>
</head>

<body>
    <h1>Descomposición de edad</h1>

    <?php
        $dia=20;
        $mes=12;
        $año=2024;

        sumar($dia,$mes,$año);
        function sumar($dia,$mes,$año){
            $dia++;
            if ($dia > 30) {
                $mes++;
                $dia=1;
            }if ($mes > 12){
                $año++;
                $mes=1;
            }
            echo "$dia,$mes,$año";
        }
    ?>
</body>

</html>
