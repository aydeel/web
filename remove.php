<?php
session_start();

if (!empty($_GET)) {
    include('connection.php');

    $jadual = mysqli_real_escape_string($condb, $_GET['jadual']);
    $medan = mysqli_real_escape_string($condb, $_GET['medan']);
    $id = mysqli_real_escape_string($condb, $_GET['userID']);

    $arahan_padam = "DELETE FROM $jadual WHERE $medan = '$id'";

    if (mysqli_query($condb, $arahan_padam)) {
        echo "<script>alert('Data Successfully Removed');
        window.location.href = 'manageuserpage.php';</script>";
    } else {
        echo "<script>alert('Data Remove Failed');
        window.history.back();</script>";
    }
} else {
    die("<script>alert('Unauthorized Access');
    window.history.back();</script>");
}
?>
