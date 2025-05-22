<?php 
error_reporting(0);
// SEGURIDAD PHP -- AÑADIDOS:
// SEGURIDAD PHP --  Creamos un inicio de sesion
session_start();
// Declaramos supervariable $_SESSION y le asignamos un numero binario random de 32 bytes.
$_SESSION ['sessionToken'] = bin2hex(random_bytes(32));




// FORMAS DE LLAMAR A UN FICHERO EN PHP

/*
// Esta opción NO detiene el script en caso de error

include 'nombreFichero';

// Esta opción, si encuentra error, detiene el script

require 'nombreFichero';

// Estas opciones llaman una unica vex al fichero:

include_once 'nombreFichero';
require_once 'nombreFichero';
*/


// Llamamos al fichero de conexión y al arraycolores
require_once '../pdo_bind_connection.php';
require_once 'traduccionColores.php';




// Vamos a enviar desde php consultas para que se hagan en la base de datos con la conexion.

// 1- Definir la instruccion a seguir en una variable.
// VAMOS A VARIARLO USANDO bindParam PARA MOSTRAR LOS DATOS DEL USUARIO LOGUEADO
$select = "SELECT * FROM colores WHERE idUsuario = :idUsuario ;";

// 2- Preparación
$preparacion = $pdo -> prepare($select);
$preparacion -> bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT);

// 3- Ejecución
$preparacion -> execute();

// 4- Obtención de valores seleccionados y transformacion en un array asociativo
$arrayFilas = $preparacion -> fetchAll();

// PARA VARIAR MÁS ADELANTE EL FONDO EN HTML/CSS
$color = "white";

// if para que, si se produce un get, cambie el idioma del color teniendo en cuenta la tabla de traduccionColores.php
if ($_GET) {

    foreach ($arrayColors as $esp => $eng){
        if ($_GET['color'] == $eng) {
            $colorTraducido = $esp;
            break;
        }
    }
}



$pdo = null;

?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once '../modulos/etiquetasMeta.php'; ?>
    <title>Colores</title>

    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<?php
    include_once '../modulos/header.php';
    ?>
    <main>
        <section class="main-colores">
            <h2>Tus usuarios</h2>
            <?php foreach ($arrayFilas as $fila) :?>

                <?php
                // COMPARATIVA MEJORADA, se usa in_array
                $color = 'white';
                $arrayLetrasOscuras = ["white", "yellow", "pink"];
                if (in_array($fila['color'], $arrayLetrasOscuras)){
                    $color = 'black';
                }


                
                // COMPARATIVA PRIMERA (antes de mejorarla)
                //if( $fila['color'] == 'white' || $fila['color'] == 'pink' || $fila['color'] == 'yellow') {$color = "black";}
                //else {$color = "white";}
                ?>             
                    <div class="items" style="background-color:<?= $fila['color']?>; color: <?= $color?>;">
                        <p>
                            <?= htmlspecialchars($fila['usuario'], ENT_QUOTES, 'UTF-8')?>
                        </p>
                        <span>
                            <a href="delete.php?id=<?=$fila['idColor']?>">
                            <i class="fa-solid fa-trash" ></i>
                            </a>
                            <a href="indexcopy.php?formuColor=update&id=<?=$fila['idColor']?>&usuario=<?= str_replace(" ", "%20", $fila['usuario'])?>&color=<?=$fila['color']?>">
                            <i class="fa-solid fa-pen" ></i>
                            </a>
                        </span>
                    </div>

            <?php endforeach ?>
        </section>

        <section class="formu">
        <?php 
        $formuColor = $_GET['formuColor'] ?? 'insert';
        // CON EL SWITCH VAMOS A HACER QUE CARGUE UN FORMULARIO U OTRO EN FUNCION DE LO QUE LLEGUE POR URL GET
        switch ($formuColor) {
            case 'insert':
                include_once '../modulos/form_insert.php';
                break;
            case 'update':
                include_once '../modulos/form_update.php';
                break;
            default:
                include_once '../modulos/form_insert.php';
                break;
        }
        ?>        
            <!-- AÑADIDO SEGURIDAD PHP: MOSTRAR ALERT CON PHP -->
             <!-- Vamos a crear un mensaje que se muestre en el caso de que la sesion de error -->
            <?php if ($_SESSION['errorSesion']): ?>
                <p>Error en la sesión</p>
            <?php endif;?>
            <!-- FIN AÑADIDO SEGURIDAD PHP -->


        </section>
    </main>
   
</body>
<script src="js/colores.js"></script>
<script src="../js/index.js"></script> 
</html>

<?php $_SESSION['errorSesion'] = false; 



?>