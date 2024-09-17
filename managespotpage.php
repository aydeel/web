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
          background-size: cover;
          font-family: Arial, sans-serif;
          color: #ffffff;
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



	













	.line{
		border : 1px solid rgba(139, 139, 139, 0.878);
        max-width: 900px;
        margin: auto;
		border-radius: 25px;
		width : 100%;
		margin-bottom: 50px;
		backdrop-filter: blur(2px) ;

	}
	.events{
		margin-left: 50px;
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
		width: 1000px;
		border-bottom: 1px solid grey;
		width: 100%;
        max-width: 900px;
        margin: auto;
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
	overflow-x: auto;
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

<?php
include('SideNavAdmin.php');
?>

<div class="topnav">
    <a  href='adminpage.php'>HOME</a>
    <a href="managemuseumpage.php">MUSEUM</a>
    <a href="manageuserpage.php">USERS</a>
	<a href = "manageeventspage.php">EVENTS</a>
    <a class = "active" href="managespotpage.php">SPOTLIGHT</a>
	<a class ="w3-text-red" href = "logout.php">LOG OUT</a>
</div>

<div class="w3-container">
    <h3><b>Manage Spotlight<b></h3>
</div>

<div class="line">
    <h1 class="events">Spotlights / Items of the month</h1>
    <div class="straightline"></div>

    <?php
    include('connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $invName = mysqli_real_escape_string($condb, $_POST['invName']);
        $invDetail = mysqli_real_escape_string($condb, $_POST['invDetail']);
        $invLocation = mysqli_real_escape_string($condb, $_POST['invLocation']);

        if (empty($invName) || empty($invDetail) || empty($invLocation)) {
            die("<script>alert('All fields are required.'); window.history.back();</script>");
        }

        if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
            $timestmp = date("Y-m-dhisA");
            $saiz_fail = $_FILES['gambar']['size'];
            $nama_fail = basename($_FILES["gambar"]["name"]);
            $jenis_gambar = pathinfo($nama_fail, PATHINFO_EXTENSION);
            $lokasi = $_FILES['gambar']['tmp_name'];
            $nama_baru_gambar = "images/" . $timestmp . "." . $jenis_gambar;

            if (move_uploaded_file($lokasi, $nama_baru_gambar)) {
                $arahan_simpan = "INSERT INTO inventorys2 (invName, invPNG, invDetail, invLocation) 
                                  VALUES ('$invName', '$nama_baru_gambar', '$invDetail', '$invLocation')";
            } else {
                die("<script>alert('File upload failed.'); window.history.back();</script>");
            }
        } else {
            $arahan_simpan = "INSERT INTO inventorys2 (invName, invDetail, invLocation) 
                              VALUES ('$invName', '$invDetail', '$invLocation')";
        }

        if (mysqli_query($condb, $arahan_simpan)) {
            echo "<script>alert('New Inventory Saved.'); window.location.href='managespotpage.php';</script>";
        } else {
            echo "<script>alert('New Inventory Failed.'); window.location.href='managespotpage.php';</script>";
        }
    }

    mysqli_close($condb);
    ?>

    <br>
    <table>
        <tr>
            <th>Inventory Name</th>
            <th>Visual</th>
            <th>Inventory Detail</th>
            <th>Inventory Location</th>
            <th>Action</th>
        </tr>
        <tr>
            <form action="" method="POST" enctype="multipart/form-data">
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="invName" rows="4" cols="25"></textarea></td>
                <td><input 	  class="w3-file" type="file" name="gambar" id="gambar" style = "width : 100% max-width : 100px"></td>
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="invDetail" rows="4" cols="25"></textarea></td>
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="invLocation" rows="4" cols="25"></textarea></td>
                <td><input type="submit" class="w3-button w3-hover-light-green w3-green w3-border w3-border-light-green w3-round-large w3-block" value="SAVE"></td>
            </form>
        </tr>
    </table>
    <br><br>

    <?php
    include('connection.php');

    $sql = "SELECT * FROM inventorys2
	ORDER BY invID Desc";
    $result = mysqli_query($condb, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
		<tr>
		<th>Item Name</th>
		<th>Detail</th>
		<th>Location</th>
		<th>Image</th>
		</tr>";


		
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
			<td>" . $row['invName'] . "</td>
			<td>" . $row['invDetail'] . "</td>
			<td>" . $row['invLocation'] . "</td>
			<td><img src='" . $row['invPNG'] . "' alt='Item Image' class='table-img' class='w3-responsive'></td>
			</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    mysqli_close($condb);
    ?>
</div>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
    }
</script>



</body>
</html>
