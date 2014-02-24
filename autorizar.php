<?php

$dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');
$query = "SELECT Nombre, Edad FROM usuarios WHERE Nombre = {$_SERVER['PHP_AUTH_USER']} AND Edad = {$_SERVER['PHP_AUTH_PW']}";
$result = mysqli_query($dbc, $query);

$rows = mysqli_fetch_array($result);
if(sizeof($rows) == 0)
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="Sistema de Alumnos"');
  exit('<h2>Sistema de Alumnos</h2>Debe ingresar un usuario/password correcto');
}

// while($row = mysqli_fetch_array($result)) {

//   $username = $row['Nombre'];
//   $password = $row['Edad'];
  
//   if(($_SERVER['PHP_AUTH_USER'] == $username) && ($_SERVER['PHP_AUTH_PW'] == $password)) {
//   break;
//   }}



  // if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
  ?>
