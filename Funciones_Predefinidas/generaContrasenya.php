<?php
function generaContrasenya($tamaño) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $contrasenya = '';
    
    for ($i = 0; $i < $tamaño; $i++) {
        $contrasenya .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    
    return $contrasenya;
}

// Ejemplo de uso
$tamaño = 12; // Puedes cambiar el tamaño según sea necesario
$contrasenyaGenerada = generaContrasenya($tamaño);
echo "Contraseña generada: $contrasenyaGenerada\n";
?>
