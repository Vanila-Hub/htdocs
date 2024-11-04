<?php
// Recuperamos la información de la sesión
session_start();

session_destroy();
header("Location: index.php");
?>