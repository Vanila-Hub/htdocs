<?php
    include 'euros.php';
    $euros = 11.90;
    $cotizacion = 136.89;
    echo "$euros son" ,euros2pesetas($euros), "pesetas <br>";

    //con una nueva cootizacion
    $euros = 11.90;
    $cotizacion = 20.89;
    echo "$euros son" ,euros2pesetas($euros,$cotizacion), "pesetas";

?>