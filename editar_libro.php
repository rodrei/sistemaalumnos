<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Sistema de Alumnos</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>

  <h2>Editar Libro</h2>

  <?php  
	$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb') or die("Error " . mysqli_error($dbc));
		if(isset($_GET['LibroID'])) {
		$id=$_GET['LibroID'];
		echo ' El libroid está seteado y es ' . $id;
		} else {
		echo 'El libroid no está seteado, pinche madre!';
		}

	$query = "SELECT * FROM libros WHERE LibroID = '$id'" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
	mysqli_close($dbc);
?>
<form method="post" action="editar_data_libro.php" />
<table>

<tr>
<td><input type="hidden" name="id" value="<?php echo "$row[LibroID]" ?>"></td>
</tr>

<tr>
<td>Título</td>
<td><input type="text" name="titulo" value="<?php echo "$row[Título]" ?>"></td>
</tr>

<tr>
<td>ISBN:</td>
<td><input type="text" name="ISBN" value="<?php echo "$row[ISBN]" ?>"></td>
</tr>

</table>
<input type="submit" value="submit" name="submit"/>
</body>
</html>