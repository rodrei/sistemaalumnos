<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistema de Alumnos</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>

  <h2>Deporte editado correctamente</h2>

  <?php  
  
  $deporte=$_POST['deporte'];
  $id=$_POST['id'];
  echo 'el id es ' . $id;
  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));

	$query = "UPDATE deportes SET Deporte = '$deporte' WHERE DeporteID= " . $id;
	echo ' el query es: ' . $query;
	$result = mysqli_query($dbc, $query);
	mysqli_close($dbc);
?>
 <a href="index.html"> Volver a inicio </a>
</body>
</html>