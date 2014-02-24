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

  <h2>Nuevo Deporte</h2>

  <?php
	$nombre = $_POST['nombre'];
	$repeticion = 0;
  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));
	
	$query = "SELECT Deporte FROM deportes";
	$nombredep = mysqli_query($dbc, $query);
	
	while($row = mysqli_fetch_array($nombredep)) {
		if($nombre == $row['Deporte']) {
		$repeticion = 1;}}
		
	if($repeticion == 0){
	echo 'El deporte fue cargado correctamente!';
	$query = "INSERT INTO deportes (Deporte) VALUES ('$nombre')" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);} else {
	echo 'Ese deporte ya existe';}
	mysqli_close($dbc);
?>
<a href="index.php">Voler al inicio</a>
</body>
</html>