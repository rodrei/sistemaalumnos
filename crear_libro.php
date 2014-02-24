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

  <h2>Crear un nuevo libro</h2>

<form method="POST" action="libro_cargado.php">
	<label for="titulo">Título: </label>
	<input type="text" name="titulo" id="titulo"> </br>
	<label for="isbn">ISBN: </label>
	<input type="text" name="isbn" id="isbn">
	<input type="submit" value="submit" name="submit"/>

</form>
<a href="index.php">Voler al inicio</a>
</body>
</html>