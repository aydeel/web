<?php
# Memulakan fungsi session
session_start();

# Menghapuskan nilai pembolehubah session
session_unset();

# Menghentikan fungsi session
session_destroy();

# Membuka fail index.php
echo"<script>window.location.href='loginpage.php';</script>";
?>