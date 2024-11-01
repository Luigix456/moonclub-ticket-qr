<?php
// Verificar si el usuario tiene rol de RRPP
include 'db.php';
session_start();
if ($_SESSION['user_role'] !== 'rrpp') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $qr_data = $_POST['qr_data'];
    $sql = "SELECT * FROM entradas WHERE qr_code = '$qr_data' AND status = 'valid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Marcar entrada como usada
        $sql_update = "UPDATE entradas SET status = 'used' WHERE qr_code = '$qr_data'";
        mysqli_query($conn, $sql_update);
        echo "Entrada válida. Acceso concedido.";
    } else {
        echo "Entrada inválida o ya usada.";
    }
}
?>
<form method="POST" action="escanear_qr.php">
    Código QR: <input type="text" name="qr_data"><br>
    <button type="submit">Escanear QR</button>
</form>
