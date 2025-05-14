<?php
// Llamamos al fichero de conexión
require_once 'conexion.php';
require_once 'traduccionColores.php';


$update = "UPDATE colores SET color = ?, usuario = ? WHERE idColor = ?;";

$updatePrepare = $conn -> prepare($update);
$updatePrepare -> execute([$arrayColors[$_POST['color']], $_POST['usuario'], $_POST['id']]);

$updatePrepare = null;
$conn = null;
header("location: index.php");
