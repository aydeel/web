<?PHP
# Memulakan fungsi session
session_start();

# Memanggil fail guard_guru.php


# Memanggil fail connection dari folder utama
include ('connection.php');

# Menguji pembolehubah session tahap mempunyai nilai atau tidak
if(empty($_SESSION['tahap']))
{
    # Proses untuk mendapatkan tahap pengguna yang sedang login sama admin atau guru
    $arahan_semak_tahap="select* from admins where
    adminsName   = '".$_SESSION['adminsName']."'
    limit 1";
    $laksana_semak_tahap=mysqli_query($condb,$arahan_semak_tahap);
    $data=mysqli_fetch_array($laksana_semak_tahap);
    $_SESSION['adminsName']=$data['adminsName'];
}
?>
<!doctype HTML>
<html>
    <head>
        <title>EzQuizMy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster&effect=shadow-multiple">
        <style>
        .w3-lobster {
          font-family: "Lobster", Sans-serif;
        }
        </style>
    </head>
<body background='../images/back.jpg'> 


<!-- header -->
<div class="w3-container w3-teal ">
<h1 class="w3-xxlarge font-effect-shadow-multiple w3-text-black" align='left'><b>
<i class="fa fa-graduation-cap" aria-hidden="true"></i> Bahagian Guru / Administrator  </b></h1>
</div>