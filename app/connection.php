<?php
$servername = "db";
$username = "root";
$password = "docker153@";
$dbname = "CrudPHP";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Error de Conexión a la Base de Datos: " . $conn->connect_error);
}
$conn->set_charset("utf8");

?>