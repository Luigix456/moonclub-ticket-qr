<?php
// Conexión a la base de datos
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $rol = 'rrpp'; // Por defecto, todos los registrados son RRPP
    $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$nombre', '$email', '$password', '$rol')";
    if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<form method="POST" action="register.php">
    Nombre: <input type="text" name="nombre"><br>
    Email: <input type="email" name="email"><br>
    Contraseña: <input type="password" name="password"><br>
    <button type="submit">Registrar</button>
</form>
