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

	$query = "SELECT * FROM usuarios WHERE UsuarioID = '$id'" or die("Error in the consult.." . mysqli_error($dbc));
	$result = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($result);
?>
<form method="post" action="editar_data_usuario.php" />
<table>

<tr>
<td><input type="hidden" name="id" value="<?php echo "$row[UsuarioID]" ?>"></td>
</tr>

<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo "$row[Nombre]" ?>"></td>
</tr>

<tr>
<td>Edad:</td>
<td><input type="text" name="edad" value="<?php echo "$row[Edad]" ?>"></td>
</tr>

</table>

<?php
echo "Libros: " . "<br> <br>";
			$query = "SELECT libros.`Título`, usuariolibro.`LibroID` FROM usuariolibro 
			JOIN libros ON (usuariolibro.`LibroID` = libros.`LibroID`) GROUP BY LibroID;";

			$result = mysqli_query($dbc, $query);

			while($row = mysqli_fetch_array($result)) {
			echo "<input type='checkbox' name='checko[]' value='" . $row['LibroID'] . "'>" . $row['Título'] . "<br>";
			}
			
			$query = "SELECT deportes.`Deporte`, deportes.`DeporteID` FROM deportes";

			$result = mysqli_query($dbc, $query);
			echo "<br>";
			echo "Deportes: <br>";
			echo "<br>";
			
			echo "<select name='combobox'>";
			
			while($row = mysqli_fetch_array($result)) {
			echo "<option value='" . $row['DeporteID'] . "'>" . $row['Deporte'] . "</option>";
			}
			echo "</select> <br>";
			echo "<br>";
			
				mysqli_close($dbc);
			
?>

<input type="submit" value="submit" name="submit"/>

<a href="index.php">Voler al inicio</a>
</body>
</html>