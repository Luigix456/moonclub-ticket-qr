<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Verificar si el usuario tiene rol de RRPP
include 'db.php';
session_start();
if ($_SESSION['user_role'] !== 'rrpp') {
    header("Location: login.php");
    exit();
}

require 'phpqrcode/qrlib.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_cliente = $_POST['nombre_cliente'];
    $dni_cliente = $_POST['dni_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $precio = $_POST['precio'];
    $id_rrpp = $_SESSION['user_id'];

    // Generar código QR
    $id_entrada = uniqid();
    $data = "https://tu_evento.com/entrada/$id_entrada";
    $filename = "qrs/$id_entrada.png";
    QRcode::png($data, $filename);

    // Insertar entrada en la base de datos
    $qr_code = file_get_contents($filename);
    $sql = "INSERT INTO entradas (id_rrpp, nombre_cliente, dni_cliente, email_cliente, precio, qr_code, status) 
            VALUES ('$id_rrpp', '$nombre_cliente', '$dni_cliente', '$email_cliente', '$precio', '$qr_code', 'valid')";
    mysqli_query($conn, $sql);

    // Enviar correo al cliente y al RRPP
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_email@example.com';
    $mail->Password = 'tu_clave_de_correo';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('tu_email@example.com', 'Discoteca');
    $mail->addAddress($email_cliente);
    $mail->addAddress($_SESSION['user_email']);

    $mail->isHTML(true);
    $mail->Subject = 'Tu Entrada para el Evento';
    $mail->Body = 'Aquí tienes tu entrada.';
    $mail->addAttachment($filename);

    $mail->send();
    echo "Entrada generada y correo enviado";
}
?>
<form method="POST" action="generar_qr.php">
    Nombre del Cliente: <input type="text" name="nombre_cliente"><br>
    DNI del Cliente: <input type="text" name="dni_cliente"><br>
    Email del Cliente: <input type="email" name="email_cliente"><br>
    Precio: <input type="text" name="precio"><br>
    <button type="submit">Generar QR</button>
</form>
