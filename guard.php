<?php
/*session_start();*/
if (!isset($_SESSION['username'])) {
    header("Location: loginpage.php");
    exit();
}
$is_admin = isset($_SESSION['jenis']) && $_SESSION['jenis'] === 'admin';
?>
