<?php
$usuario = trim($_GET['correo']);
$contraseña = trim($_GET['contraseña']);

$nombre = "juan";
$contra = "123";

if ($usuario === $nombre && $contraseña === $contra) {
    include('ok.php');
} else {
    include('ko.php');
    if ($usuario !== $nombre) {
        malUsu();
    } elseif ($contraseña !== $contra) {
        malCon();
    }
}
?>
