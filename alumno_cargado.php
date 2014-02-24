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

  <h2>El nuevo usuario fue cargado!</h2>

  <?php
	if (isset($_POST['submit'])) {
	echo ' Submit seteado! ' ;}
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	if (isset($_POST['combobox'])) {
	$deportes = $_POST['combobox'];
	} else{
	echo 'El combobox no está seteado, wey!';
	}

	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');

	$query = "INSERT INTO usuarios (Nombre, Edad) VALUES ('$nombre', '$edad')";
	$result = mysqli_query($dbc, $query);

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
					$query = "INSERT INTO usuariolibro (UsuarioID, LibroID) VALUES ((select MAX(UsuarioID) FROM usuarios), '$checkoo[$i]')";
					$insertated = mysqli_query($dbc, $query);
			}}}
			
	$query = "SELECT deportes.`Deporte`, deportes.`DeporteID`, COUNT(*) FROM usuariodeportes 
			JOIN deportes ON (usuariodeportes.`DeporteID` = deportes.`DeporteID`) GROUP BY DeporteID;";
	$result = mysqli_query($dbc, $query);
	
		while($row = mysqli_fetch_array($result)) {
			if($deportes == $row['DeporteID']) {
				$query = "INSERT INTO usuariodeportes (UsuarioID, DeporteID) VALUES ((select MAX(UsuarioID) FROM usuarios), '$deportes')";
				$result2= mysqli_query($dbc, $query);
				}}
	
mysqli_close($dbc);

?>
<a href="index.php">Voler al inicio</a>
</body>
</html>