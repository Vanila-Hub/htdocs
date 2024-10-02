<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descomposición de Dinero</title>
</head>

<body>
    <h1>Descomposición de Dinero</h1>

    <?php
        $input = 44;
        $_cantidad_entrante = intval($input);

        $_billetes = [500, 200, 100, 50, 20, 10, 5];
        $_monedas = [2,1];
        $_resultado = [];    

        foreach ($_billetes as $_billete) {
            if ($_cantidad_entrante >= $_billete) {
                $_resultado[$_billete] = intdiv($_cantidad_entrante,$_billete);
                $_cantidad_entrante %= $_billete;
            }
        }
        foreach($_monedas as $_moneda) {
            if ($_cantidad_entrante >= $_moneda) {
                $_resultado[$_moneda] = intdiv($_cantidad_entrante,$_moneda);
                $_cantidad_entrante %= $_moneda;
            }
        }

        foreach ($_resultado as $clave => $valor) {
            $tipo = in_array($clave,$_billetes)?"billetes":"monedas";
            echo "<ul>
            <li>$valor $tipo de $clave</li>
            </ul>";
        }
    ?>
</body>

</html>
