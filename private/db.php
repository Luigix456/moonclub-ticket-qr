<?php
$host = 'tu_host';
$db = 'tu_base_de_datos';
$user = 'tu_usuario';
$pass = 'tu_contraseña';
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>