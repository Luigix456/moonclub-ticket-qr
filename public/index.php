<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - MOONCLUB</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Bienvenido a MOONCLUB</h2>
        <form method="POST" action="login.php">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
