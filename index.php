<?php 
	$alert = '';
	session_start();
	if(!empty($_SESSION['active']))
	{
		header('location: sistema/');
	}else{



	if (!empty($_POST)) 
	{
		// code...
		if(empty($_POST['usuario']) || empty($_POST['clave'])) 
		{
			// code...
			$alert = 'Ingrese su Usuario y Clave';
		}else{

			require_once "conexion.php";
		
			$user = mysqli_real_escape_string($conection, $_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($conection, $_POST['clave']));

			$query = mysqli_query($conection, "SELECT * FROM usuario where usuario = '$user' AND clave = '$pass'");
			$result = mysqli_num_rows($query);

			if ($result > 0) 
			{
				// code...
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['email']  = $data['email'];
				$_SESSION['user']   = $data['usuario'];
				$_SESSION['rol']    = $data['rol'];
				
				header('location: sistema/');
			}
			else{
				$alert = 'El usuario o clave son incorrectos';
				session_destroy();
			}
		}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login - sistema de facturacion</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<section id="container">
		<form action="" method="post">
			<h3>iniciar secion</h3>
			<img src="img/icon-login.ico">
			<input type="text" name="usuario" placeholder="Ingrese su Usuario">
			<input type="password" name="clave" placeholder="Ingrese su Contraseña">
			<div class="alert"><?php echo isset($alert) ? $alert:''; ?></div>
			<input type="submit" name="Ingresar">
		</form>
	</section>
</body>
</html>