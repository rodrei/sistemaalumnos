<?php

function get_alumnos() {
  $query = "SELECT usuarios.UsuarioID, usuarios.`Nombre`, Edad, GROUP_CONCAT(libros.`Título`), Deporte FROM usuarios LEFT OUTER JOIN usuariolibro ON (usuarios.`UsuarioID` = usuariolibro.`UsuarioID`)
  LEFT OUTER JOIN libros ON (usuariolibro.`LibroID` = libros.`LibroID`)
  LEFT OUTER JOIN usuariodeportes ON (usuarios.`UsuarioID` = usuariodeportes.`UsuarioID`)
  LEFT OUTER JOIN deportes ON (usuariodeportes.`DeporteID` = deportes.`DeporteID`) GROUP BY usuarios.`UsuarioID`;";

  $result = mysqli_query($dbc, $query);

  $list = array();

  while($row = mysqli_fetch_array($result)) {
    $list[] = $row;
  }

  return $list;
}

function get_alumno_by_id($id) {

}

function get_alumno_by_name_and_edad($name, $edad) {

}

?>
