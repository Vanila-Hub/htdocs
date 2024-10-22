<?php
if ( isset( $_COOKIE[ 'visitas' ] ) ) {

    setcookie( 'visitas', $_COOKIE[ 'visitas' ] + 1, time() + 6 );
    $mensaje = 'Numero de visitas: '.$_COOKIE[ 'visitas' ];
}
else {

    setcookie( 'visitas', 1, time() + 6 );
    $mensaje = 'Bienvenido por primera vez a nuesta web';
}
?>  
<html>
    <head>
        <title>Cookie</title>
    </head>
    <body>
        <p>
            <?php echo $mensaje;?>
        </p>    
    </body>
</html>