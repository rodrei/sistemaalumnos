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


  <h2>Listado total de usuarios</h2>

<br>
<?php
$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');

$query = "SELECT usuarios.UsuarioID, usuarios.`Nombre`, Edad, GROUP_CONCAT(libros.`Título`), Deporte FROM usuarios LEFT OUTER JOIN usuariolibro ON (usuarios.`UsuarioID` = usuariolibro.`UsuarioID`)
LEFT OUTER JOIN libros ON (usuariolibro.`LibroID` = libros.`LibroID`)
LEFT OUTER JOIN usuariodeportes ON (usuarios.`UsuarioID` = usuariodeportes.`UsuarioID`)
LEFT OUTER JOIN deportes ON (usuariodeportes.`DeporteID` = deportes.`DeporteID`) GROUP BY usuarios.`UsuarioID`;";

$result = mysqli_query($dbc, $query);

echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Edad</th>
<th>Libros</th>
<th>Deporte</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['Nombre'] . "</td>";
echo "<td>" . $row['Edad'] . "</td>";
echo "<td>" . $row['GROUP_CONCAT(libros.`Título`)'] . "</td>";
echo "<td>" . $row['Deporte'] . "</td>";
echo "<td><a href=editar_usuario.php?UsuarioID=" . $row['UsuarioID'] .  ">Editar</a></td>";
echo "<td><a href=eliminar_usuario.php?UsuarioID=" . $row['UsuarioID'] .  ">Eliminar</a></td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($dbc);

?>

<a href="index.php">Voler al inicio</a>


</body>
</html>