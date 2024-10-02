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
        $a=1;
        $b=0;
        $c=-6;

        $resultadoRaiz = sqrt($b**2 - (4*$a*$c));
        $resultadoFinal = 0;
        $resultado=0;

        if ($resultadoRaiz > 0) {
            echo "es el caso 1";
            $resultadoFinal = - $b + $resultadoRaiz;
        } if ($resultadoRaiz < 0){
            $resultadoFinal = - $b - $resultadoRaiz;
            echo "caso 2";
        }

        if ($resultadoFinal ==0) {
            echo "no hay solucion";
        }else {
            $resultado = $resultadoFinal / (2*$a);
            echo "el resultado es $resultado";
        }
    ?>
</body>

</html>
