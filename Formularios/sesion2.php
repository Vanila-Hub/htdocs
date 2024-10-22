<?php
    session_start();
    $usuario = $_SESSION["nombre"]; // recuperación
    echo "Otra vez soy el usuario: $usuario ";
?>