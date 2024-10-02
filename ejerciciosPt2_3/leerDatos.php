<?php 
    $cantida = $_GET["cantidad"];
    echo "<form action='sumarDatos.php'>";
    for ($i=1; $i <$cantida +1; $i++) { 
        echo "
        <br>
        <label for='cantidad'>Cantidad $i</label>
        <input type='text' id='cantidad' name='cantidad$i'><br>";
    }
    echo "
    <input type='text' value=$cantida name='original' hidden>
    <button type='submit'>Enviar</button>
    </form>"
?>