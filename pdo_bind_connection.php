<?php

// Definimos los valores de la conexion

$host = 'localhost';
$dbname = 'colores';
$port = 3307;
$username = 'colores';
$password = 'colores';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    // echo "Conexion exitosa";

} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    echo "Error de conexion:".$e->getMessage();
    exit();
}
