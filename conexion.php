<?php 
	$host = 'localhost';
	$user = 'frank';
	$password = '12345';
	$db = 'factura1';

	$conection = @mysqli_connect($host,$user,$password,$db);
	if (!$conection) {
		// Esto es para verificar si la conexion a la base de datos no se realiza saldra un texto error de conexion...
		echo "Error de conexion";
	}else{
		echo "Vas por buen camino la conexion se a realizado con Exito ";
	}
 ?>