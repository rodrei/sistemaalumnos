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

  <h2>Crear un nuevo usuario</h2>

<form method="POST" action="alumno_cargado.php">
	<label for="nombre">Apellido y Nombre:</label>
	<input type="text" id="nombre" name="nombre"/> <br />
	<label for="edad">Edad:</label>
	<input type="text" id="edad" name="edad"/> <br />
	<p>Libros: </p>
		<?php
			$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');

			$query = "SELECT libros.`Título`, libros.`ISBN`, usuariolibro.`LibroID`, COUNT(*) FROM usuariolibro 
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
</form>
<a href="index.php">Voler al inicio</a>
</body>
</html>