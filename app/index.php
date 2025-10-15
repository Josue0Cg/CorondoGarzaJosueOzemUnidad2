<?php
require_once 'connection.php';
$resultado = $conn->query("SELECT VERSION() as version");
$version_mysql = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>¡Bienvenido a tu CRUD!</h1>
  <p>La conexión a la base de datos fue un éxito.</p>
  <p>Versión de MySQL: <?php echo $version_mysql['version']; ?></p>
</body>
</html>