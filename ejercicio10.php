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
        $hora=23;
        $minuto=40;
        $seg=59;

        sumar($hora,$minuto,$seg);

        function sumar($hora,$minuto,$seg){
            $seg++;
            if ($seg > 59) {
                $minuto++;
                $seg=0;
            }if ($minuto > 59){
                $hora++;
                $minuto=0;
            }if ($hora>23) {
                $hora=0;
            }
            echo "$hora $minuto $seg";
        }
    ?>
</body>

</html>
