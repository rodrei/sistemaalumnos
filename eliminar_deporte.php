<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistema de Alumnos</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>

  <h2>Eliminar Deporte</h2>

  <?php  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));
		if(isset($_GET['DeporteID'])) {
		$id=$_GET['DeporteID'];
		echo ' El userid está seteado y es ' . $id;
		} else {
		echo 'El userid no está seteado, pinche madre!';
		}

	$query = "DELETE FROM usuariodeportes WHERE DeporteID = '$id'" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	
	echo 'la query 1 es: ' . $query;
	
	$query = "DELETE FROM deportes WHERE DeporteID = '$id'" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	
	echo 'la query 2 es: ' . $query;
	mysqli_close($dbc);
	?>

</body>
</html>