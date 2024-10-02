<?php
    $_nombre = $_GET["nombre"];
	$_apellido = $_GET["apellido"];
	$_email = $_GET["email"];
	$_anoNaci = $_GET["anoNaci"];
	$_telf = $_GET["telf"];

    echo "
		<table border=1>
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