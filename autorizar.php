<?php

  $dbc = mysqli_connect('localhost', 'Pepioca', 'samsonco3usb', 'sistemaalumnosdb');
$query = "SELECT Nombre, Edad FROM usuarios";
$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result)) {

  $username = $row['Nombre'];
  $password = $row['Edad'];
  
  if(($_SERVER['PHP_AUTH_USER'] == $username) && ($_SERVER['PHP_AUTH_PW'] == $password)) {
  break;
  }}
 
  if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Sistema de Alumnos"');
    exit('<h2>Sistema de Alumnos</h2>Debe ingresar un usuario/password correcto');
  } 
  ?>
