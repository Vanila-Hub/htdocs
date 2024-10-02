<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejemplo de Tabla</title>
</head>

<body>
	<?php
	$_nombre = "Juan Antero";
	$_apellido = "Asumu";
	$_email = "batman@dccomics.com";
	$_anoNaci = 2000;
	$_telf = "666123456";
	$_border = 1;
	
	echo "
		<table border=".$_border.">
		<tr>
			<th>Nombre</th>
			<td>$_nombre</td>
		</tr>
		<tr>
			<th>Apellidos</th>
			<td>$_apellido</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>$_email</td>
		</tr>
		<tr>
			<th>Año de nacimiento</th>
			<td>$_anoNaci</td>
		</tr>
		<tr>
			<th>Telefono</th>
			<td>$_telf</td>
		</tr>
	</table>
	";
	?>
</body>

</html>