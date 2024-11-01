<?php
// Incluir autoload de Composer si es necesario
require '../vendor/autoload.php';

// Obtener las variables de entorno
$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

// Conectar a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
