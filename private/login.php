<?php
// Conexión a la base de datos
include 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['rol'];
        header("Location: dashboard.php");
    } else {
        echo "Correo o contraseña incorrectos";
    }
}
?>
<form method="POST" action="login.php">
    Email: <input type="email" name="email"><br>
    Contraseña: <input type="password" name="password"><br>
    <button type="submit">Iniciar Sesión</button>
</form>
