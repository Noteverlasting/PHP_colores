<?php
//COMO NO QUEREMOS QUE NOS SALGAN WARNINGS EN PANTALLA, DESACTIVAMOS LOS ERRORES
// Lo ideal es arreglarlo con javascript, pero si no se puede, lo desactivamos
//VAMOS A QUITAR EL ERROR REPORTING PORQUE NO ES LA MEJOR PRACTICA
// error_reporting(0);

session_start();
require_once 'pdo_bind_connection.php';

// VARIABLES Y ARRAY PARA GENERAR IMAGENES RANDOM 
$num_random = random_int(0,4);      
$imagenes = [
        [
            'src' => 'img/colores.jpg',
            'alt' => 'aura de colores degradados'
        ],
        [
            'src' => 'img/colores2.webp',
            'alt' => 'ondas de colores'
        ],
        [
            'src' => 'img/colores3.avif',
            'alt' => 'formas geometricas de colores'
        ],
        [
            'src' => 'img/colores4.jpg',
            'alt' => 'nubes de colores'
        ],
        [
            'src' => 'img/colores5.avif',
            'alt' => 'aura de colores degradados'
        ]
    ];

include_once 'modulos/idioma.php';
echo $idioma;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once 'etiquetasMeta.php'; ?> 
    <title>Favicolores, tu app de colores</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
    include_once 'modulos/header.php';
    ?>
    <main class="index-main">

    <section>
        
     <img src="<?=$imagenes[$num_random]['src'] ?>" alt="<?=$imagenes[$num_random]['alt'] ?>">

    </section>

    <section>
        <!-- ESTE PHP VA A RECIBIR LO QUE TENGAMOS EN LA VARIABLE, PERO SI NO ESTÁ DISPONIBLE, USA EL LOGIN -->
        <?php 
        $formulario = $_GET['formulario'] ?? 'login';
        // CON EL SWITCH VAMOS A HACER QUE CARGUE UN FORMULARIO U OTRO EN FUNCION DE LO QUE LLEGUE POR URL GET
        switch ($formulario) {
            case 'login':
                include_once 'modulos/form_login.php';
                break;
            case 'crear-usuario':
                include_once 'modulos/form_crear-usuario.php';
                break;
            case 'reset':
                include_once 'modulos/form_reset.php';
                break;
            default:
                include_once 'modulos/form_login.php';
                break;
        }
    




        ?>
    </section>

    </main>
</body>
<script src="js/index.js"></script>
</html>

<?php 

$_SESSION['errorUserInexistente'] = false;
$_SESSION['error'] = false;