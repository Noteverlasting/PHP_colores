<?php
// Nos vamos a conectar a la base de datos colores que hemos creado anteriormente en phpmyAdmin
// Vamos a definir variables para poder acceder a la conexion
// El server "localhost" tiene esta direccion
// $serverName = "127.0.0.1";
// Pero muchas veces no funciona, así que usamos el nombre localhost

// $serverName = "localhost";
// $database = "colores";
// $port = 3306;
// $user = "root"; // este user no se debe utilizar, es mejor definir un usuario que no sea el raiz.
// $password = "";


//PARA CONECTARSE (POR EJEMPLO) A UNA DB EN MYSQL, CAMBIAMOS PUERTO Y CONTRASEÑA -EN ESTE CASO-

$serverName = "localhost";
$database = "colores";
$port = 3307;
$user = "root"; // este user no se debe utilizar, es mejor definir un usuario que no sea el raiz.
$password = "CIEF1234";



try {
    //INTENTA LA CONEXION
    $conn = new PDO ("mysql:host=$serverName;port=$port;dbname=$database", $user, $password);
    // echo "¡Conectado a $database! <br>";

    // foreach ($conn -> query('SELECT * FROM colores') as $fila) {
    //     // print_r($fila);
    //     echo $fila['usuario'];

    // }

} catch (PDOException $error){
    //SI FALLA, NOS INDICARÁ EL ERROR
    echo "Error $error";
}




























?>