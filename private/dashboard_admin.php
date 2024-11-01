<?php
// Verificar si el usuario tiene rol de admin
include 'db.php';
session_start();
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Consultar cantidad de RRPP registrados
$rrpp_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM usuarios WHERE rol = 'rrpp'");
$rrpp_total = mysqli_fetch_assoc($rrpp_count)['total'];

// Consultar cantidad de entradas vendidas
$entradas_count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM entradas");
$entradas_total = mysqli_fetch_assoc($entradas_count)['total'];

// Consultar cantidad de dinero recaudado
$dinero_total_query = mysqli_query($conn, "SELECT SUM(precio) AS total FROM entradas");
$dinero_total = mysqli_fetch_assoc($dinero_total_query)['total'];
?>
<h2>Panel de Administración</h2>
<p>RRPP Registrados: <?php echo $rrpp_total; ?></p>
<p>Entradas Vendidas: <?php echo $entradas_total; ?></p>
<p>Dinero Recaudado: $<?php echo $dinero_total; ?></p>
