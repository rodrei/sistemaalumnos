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


  <h2>Listado total de Deportes</h2>

<br>
<?php
$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');

$query = "SELECT deportes.`Deporte`, deportes.`DeporteID`, COUNT(usuariodeportes.DeporteID) as contador FROM deportes  
LEFT OUTER JOIN usuariodeportes ON (usuariodeportes.`DeporteID` = deportes.`DeporteID`) GROUP BY DeporteID";

$result = mysqli_query($dbc, $query);

echo "<table border='1'>
<tr>
<th>Deporte</th>
<th>Cant. de Usuarios</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['Deporte'] . "</td>";
echo "<td>" . $row['contador'] . "</td>";
echo "<td><a href=editar_deporte.php?DeporteID=" . $row['DeporteID'] .  ">Editar</a></td>";
echo "<td><a href=eliminar_deporte.php?DeporteID=" . $row['DeporteID'] .  ">Eliminar</a></td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($dbc);

?>

<a href="index.php">Voler al inicio</a>


</body>
</html>