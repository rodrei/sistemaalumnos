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

  <h2>Usuario editado correctamente</h2>

  <?php  
  
  $nombre=$_POST['nombre'];
  $edad=$_POST['edad'];
  $id=$_POST['id'];
  $deportes = $_POST['combobox'];
  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));

	$query = "UPDATE usuarios SET Nombre= '". $nombre . "', Edad= '" . $edad . "' WHERE UsuarioID=  $id" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	
	$query = "DELETE FROM usuariolibro WHERE UsuarioID = '$id'";
	$result =mysqli_query($dbc, $query);
	
	$query = "DELETE FROM usuariodeportes WHERE UsuarioID = '$id'";
	$result =mysqli_query($dbc, $query);
	
	$query = "INSERT INTO usuariodeportes (UsuarioID, DeporteID) VALUES ('$id', '$deportes')";
	$result =mysqli_query($dbc, $query);
	
	$query = "SELECT libros.`Título`, libros.`ISBN`, usuariolibro.`LibroID`, COUNT(*) FROM usuariolibro 
			JOIN libros ON (usuariolibro.`LibroID` = libros.`LibroID`) GROUP BY LibroID";
	$result = mysqli_query($dbc, $query);
	
	$checkoo = $_POST['checko'];
	$N = count($checkoo);
	echo 'Checkoo está ' . $N . ' veces.';
	
		while($row = mysqli_fetch_array($result)) {
			for ($i = 0; $i < $N; $i++) {
				if ((isset($_POST['checko'])) && ($checkoo[$i] == $row['LibroID'])){
					echo 'La variable checko es genial y su número es' . $checkoo[$i];
					$query = "INSERT INTO usuariolibro (UsuarioID, LibroID) VALUES ('$id', '$checkoo[$i]')";
					$insertated = mysqli_query($dbc, $query);
			}}}
	
	mysqli_close($dbc);
?>
<a href="index.php">Voler al inicio</a>
</body>
</html>