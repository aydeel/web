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
		margin-left: auto;
		margin-right: auto;
		border-radius: 25px;
		width : 90%;
		margin-bottom:50px;
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

<?php
include('SideNavAdmin.php');
?>

<div class = "topnav">
<a href ='adminpage.php'>HOME</a>
<a href = "managemuseumpage.php">MUSEUM</a>
<a href = "manageuserpage.php">USERS</a>
<a class = "active" href = "manageeventspage.php">EVENTS</a>
<a href = "managespotpage.php">SPOTLIGHT</a>
<a class ="w3-text-red" href = "logout.php">LOG OUT</a>
</div>

</div>

<div class="w3-container">
    <h3><b>Manage Events<b></h3>
</div>

<div class="line">
    <h1 class="events">Recents Events</h1>

    <?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventID = mysqli_real_escape_string($condb, $_POST['eventID']);
    $eventName = mysqli_real_escape_string($condb, $_POST['eventName']);
    $eventDetail = mysqli_real_escape_string($condb, $_POST['eventDetail']);

    if (empty($eventID) || empty($eventName) || empty($eventDetail)) {
        die("<script>alert('All fields are required.'); window.history.back();</script>");
    }

    if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
        $timestmp = date("Y-m-dhisA");
        $saiz_fail = $_FILES['gambar']['size'];
        $nama_fail = basename($_FILES["gambar"]["name"]);
        $jenis_gambar = pathinfo($nama_fail, PATHINFO_EXTENSION);
        $lokasi = $_FILES['gambar']['tmp_name'];
        $nama_baru_gambar = "imagesEvent/" . $timestmp . "." . $jenis_gambar;

        if (move_uploaded_file($lokasi, $nama_baru_gambar)) {
            $arahan_simpan = "INSERT INTO events (eventID, eventName, eventPNG, eventDetail) 
                              VALUES ('$eventID', '$eventName', '$nama_baru_gambar', '$eventDetail')";
        } else {
            die("<script>alert('File upload failed.'); window.history.back();</script>");
        }
    } else {
        $arahan_simpan = "INSERT INTO events (eventID, eventName, eventDetail) 
                          VALUES ('$eventID', '$eventName', '$eventDetail')";
    }

    if (mysqli_query($condb, $arahan_simpan)) {
        echo "<script>alert('New Event Saved.'); window.location.href='manageeventspage.php';</script>";
    } else {
        echo "<script>alert('New Event Failed.'); window.location.href='manageeventspage.php';</script>";
    }
}

mysqli_close($condb);
?>


    <br>
    <table>
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Event Image</th>
            <th>Event Detail</th>
            <th>Action</th>
        </tr>
        <tr>
            <form action="" method="POST" enctype="multipart/form-data">
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="eventID" rows="4" cols="25"></textarea></td>           
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="eventName" rows="4" cols="25"></textarea></td>
                <td><input 	  class="w3-file" type="file" name="gambar" id="gambarE"></td>
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="eventDetail" rows="4" cols="25"></textarea></td>
                <td><input type="submit" class="w3-button w3-hover-light-green w3-green w3-border w3-border-light-green w3-round-large w3-block" value="simpan"></td>
            </form>
        </tr>
    </table>
    <br><br>

    <?php
include('connection.php');

$sql = "SELECT * FROM events";
$result = mysqli_query($condb, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
    <tr>
    <th>Event ID</th>
    <th>Event Name</th>
    <th>Event Image</th>
    <th>Event Detail</th>
    <th>Action</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . htmlspecialchars($row['eventID']) . "</td>
        <td>" . htmlspecialchars($row['eventName']) . "</td>
        <td><img src='" . htmlspecialchars($row['eventPNG']) . "' alt='Event Image' class='table-img'></td>
        <td>" . htmlspecialchars($row['eventDetail']) . "</td>
        <td><a href='editevents.php?eventID=" . htmlspecialchars($row['eventID']) . "'>Edit</a> |
             <a href='removeevent.php?eventID=" . htmlspecialchars($row['eventID']) . "' onclick=\"return confirm('Are you sure you want to delete this event?')\">Delete</a></td>
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
