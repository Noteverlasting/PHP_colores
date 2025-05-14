<?php
// Llamamos al fichero de conexión
require_once 'conexion.php';

echo $_GET['id'];

$delete = "DELETE FROM colores WHERE idColor = ?;";

$deletePrepare = $conn -> prepare($delete);
$deletePrepare -> execute([$_GET['id']]);

$deletePrepare = null;
$conn = null;

header("location: index.php");