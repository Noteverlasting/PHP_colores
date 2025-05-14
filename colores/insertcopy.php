<?php

// Llamamos al fichero de conexión
require_once 'conexion.php';

// print_r($_POST);
// echo "<br>";
// echo $_POST['usuario'];
// echo "<br>";
// echo $_POST['color'];

//PARA "TRADUCIR" LOS COLORES DEL FORMULARIO
// $arrayColors = [
//     "rojo" => "red",
//     "azul" => "blue",
//     "verde" => "green",
//     "amarillo" => "yellow",
//     "rosa" => "pink",
//     "violeta" => "purple",
//     "blanco" => "white",
//     "negro" => "black",
//     "gris" => "gray"
// ];




//DECLARAMOS EL INSERT
$insert = "INSERT INTO colores (color, usuario) VALUES (?, ?);";
//PREPARAMOS COMO FUNCIONARÁ EL INSERT
$insertPrepare = $conn -> prepare($insert);

$insertPrepare -> execute([$_POST['color'], $_POST['usuario']]);
// ESTA OPCION ES PARA EJECUTAR CON EL ARRAYCOLORS -que hemos añadido despues-
// $insertPrepare -> execute([$arrayColors[$_POST['color']], $_POST['usuario']]);
//PARAMOS EL PREPARE Y LA CONEXION
$insertPrepare = null;
$conn = null;

//VOLVEMOS A LA PAGINA DE ORIGEN
header("location: index.php");



?>