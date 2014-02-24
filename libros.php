<?php
  require_once('autorizar.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>

	<meta http-equiv="Content-Type" content="text/html; charset= UTF-8" />
	<title>Sistema de Alumnos</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>


<body>


  <h2>Listado total de libros</h2>

<br>
<?php
$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');

$query = "SELECT libros.`LibroID`, libros.`Título`, libros.ISBN, COUNT(usuariolibro.`LibroID`) AS contador
FROM libros 
LEFT JOIN usuariolibro ON (usuariolibro.`LibroID` = libros.`LibroID`)
LEFT JOIN usuarios ON (usuariolibro.UsuarioID = usuarios.`UsuarioID`) GROUP BY libros.libroID";

$result = mysqli_query($dbc, $query);


echo "<table border='1'>
<tr>
<th>Título</th>
<th>ISBN</th>
<th>Cant. de Usuarios</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['Título'] . "</td>";
echo "<td>" . $row['ISBN'] . "</td>";
echo "<td>" . $row['contador'] . "</td>";
echo "<td><a href=editar_libro.php?LibroID=" . $row['LibroID'] .  ">Editar</a></td>";
echo "<td><a href=eliminar_libro.php?LibroID=" . $row['LibroID'] .  ">Eliminar</a></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($dbc);

?>

<a href="index.php">Voler al inicio</a>


</body>
</html>