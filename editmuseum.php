<?php
session_start();
include('connection.php');
include('guard.php');

if (!isset($_GET['museumID'])) {
    die("No museum ID provided!");
}

$museumID = mysqli_real_escape_string($condb, $_GET['museumID']); // Securely handle the ID

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $museumName = mysqli_real_escape_string($condb, $_POST['museumName']);
    $museumDetail = mysqli_real_escape_string($condb, $_POST['museumDetail']);
    
    $updateSQL = "UPDATE museums SET museumName='$museumName', museumDetail='$museumDetail' WHERE museumID='$museumID'";

    if (mysqli_query($condb, $updateSQL)) {
        echo "<script>alert('Museum updated successfully.'); window.location.href='managemuseumpage.php';</script>";
    } else {
        echo "Error updating museum: " . mysqli_error($condb);
    }
}

$sql = "SELECT * FROM museums WHERE museumID='$museumID'";
$result = mysqli_query($condb, $sql);

if (mysqli_num_rows($result) === 1) {
    $museum = mysqli_fetch_assoc($result);
} else {
    die("Museum not found!");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
   
  
<style>

        body { 
            background-image: url('black.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center; 
            background-size: 1700px 900px;
            font-family: Arial;
            transition:  none .5s;
        }

        .table-img {
            width: 100px;
            height: auto;
        }

        .topnav {
            overflow: auto;
            background-color: none;
            margin-top: 10px;
            margin-left: 60px;
            margin-right: 10px;
            float:right;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: right;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a.active {
            color: rgb(255, 181, 44);
        }

        .topnav a:hover {
            color: rgb(255, 183, 0);
            text-decoration: underline;
        }

        .sidenav {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
        }

        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }

        .sidenav a:hover {
          color: #f1f1f1;
        }

        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        #main {
          transition: margin-left .5s;
          padding: 16px;
          display: inline-block;
          position: absolute;
          opacity: 0.1;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }



        img{
            width : 500px;
        }





        .ppmenari-container::after{
            border : 1px solid rgba(139, 139, 139, 0.878);
            backdrop-filter: blur(5px) ;
        }
        .descppmenari-kiri{
            overflow: auto;
            float: left;
            vertical-align:top;
            margin-left: 300px;
            margin-top: 200px;
            position: absolute;
        }
        .gambarppmenari-kanan{
            float: left;
            margin-left: 800px;
            margin-top: 200px;
            position: absolute;
        }
        .btnselect1 a{
            cursor: pointer;
            background-color: #ffb74a;
              color: rgb(255, 255, 255);
              padding: 10px 20px;
            border-radius: 20px;
              width: 4%;
              opacity: 0.9;
            margin-top: 470px;
            margin-left: 300px;
            position: absolute;
            text-decoration: none;
            font-weight: 900;
        }












        .line{
            border : 1px solid rgba(139, 139, 139, 0.878);
            margin-top: 100px;
            margin-left: 110px;
            margin-right: 60px;
            border-radius: 25px;
            width : 90%;
            position: absolute;
            backdrop-filter: blur(2px) ;
        
        }
        .events{
            margin-left: 50px;
        }
        .gmbardandesc::after{
            content: "";
              clear: both;
              display: table;
        }
        .gmba{
            float: left;
            width : 400px;
            height : 250px;
            margin-top : 20px;
            margin-left : 80px;
            position: absolute;
        }
        .descevent{
            overflow: auto;
            float:left;
            color: rgb(221, 187, 255);
            margin-left: 700px;
            margin-right: 100px;
            margin-top: 40px;
            position: absolute;
        }
        .btnselect2 a {
            cursor: pointer;
            background-color: #ffb74a;
              color: rgb(255, 255, 255);
              padding: 10px 20px;
            border-radius: 20px;
              width: 10%;
              opacity: 0.9;
            margin-top: 10px;
            margin-left: 1200px;
            position: absolute;
            text-decoration: none;
            text-align: center;
            font-weight: 900;
        }
        .btnselect:hover{
            opacity: 0.7;
        }


        .lineVertical {
        border-left: 1px solid white;
        height: 400px;
        position: absolute;
        left: 32%;
        margin-left: -3px;
        top: 20;
        }

        .lineVertical2 {
        border-left: 1px solid white;
        height: 400px;
        position: absolute;
        left: 67%;
        margin-left: -3px;
        top: 20;
        }

        .straightline{
            width: 1200px;
            border-bottom: 1px solid grey;
            margin-left: 70px;
            margin-top: 20px;
        }
        .lineabout{
            width: 1000px;
            border-top: 1px solid grey;
            border-bottom: 1px solid grey;
            margin-left: 290px;
            margin-top: 2200px;
            padding-bottom: 100px;
            position: absolute;
        }

        h3 {
          font-size: 80px;
        margin-left: 50px;
        }

        h4 {
            margin-left: 700px;
        }


        table, td, th {
        border: 1px solid;
        }

        td, th {
        padding: 15px;
        }


        table {
        width: 100%;
        height: 200px;
        
        border-collapse: collapse;
        }




</style>





</head>
<body style="color: rgb(255, 255, 255); background-color: white;">

<div class="topnav">
    <a class="active" href='adminpage.php'>HOME</a>
    <a href="managemuseumpage.php">MUSEUM</a>
    <a href="manageuserpage.php">USERS</a>
    <a href="manageeventspage.php">EVENTS</a>
    <a href="managespotpage.php">SPOTLIGHT</a>
    <a class="b" href="logout.php">LOG OUT</a>
</div>

<div class="w3-container">
    <h3 class="w3-margin"><b>Edit Museum</b></h3>

    <form method="POST" action="">
        <p>
            <label for="museumName">Museum Name:</label>
            <input type="text" id="museumName" name="museumName" value="<?php echo htmlspecialchars($museum['museumName']); ?>" required>
        </p>
       
        <p>
            <label for="detail">Detail:</label>
            <textarea id="detail" name="museumDetail" required><?php echo htmlspecialchars($museum['museumDetail']); ?></textarea>
        </p>
        <p>
            <input type="submit" value="Update Museum">
        </p>
    </form>
</div>

</body>
</html>
