<?php
  require_once('autorizar.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistema de Alumnos</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>

  <h2>Editar Usuario</h2>

  <?php  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));
		if(isset($_GET['UsuarioID'])) {
		$id=$_GET['UsuarioID'];
		echo ' El userid está seteado y es ' . $id;
		} else {
		echo 'El userid no está seteado, pinche madre!';
		}

	$query = "DELETE FROM usuariolibro WHERE UsuarioID = '$id'";
	$result = mysqli_query($dbc, $query) or die("Error in the consult.." . mysqli_error($dbc));
	
	$query = "DELETE FROM usuariodeportes WHERE UsuarioID = '$id'"; // or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	
	$query = "DELETE FROM usuarios WHERE UsuarioID = '$id'"; // or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	mysqli_close($dbc);
	?>
<a href="index.php">Voler al inicio</a>
</body>
</html>