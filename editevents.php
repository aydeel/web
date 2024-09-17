<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update the event
    $eventID = mysqli_real_escape_string($condb, $_POST['eventID']);
    $eventName = mysqli_real_escape_string($condb, $_POST['eventName']);
    $eventDetail = mysqli_real_escape_string($condb, $_POST['eventDetail']);
    $currentImage = mysqli_real_escape_string($condb, $_POST['currentImage']);
    
    if (empty($eventName) || empty($eventDetail)) {
        die("<script>alert('All fields are required.'); window.history.back();</script>");
    }

    // Check if a new image is uploaded
    if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
        $timestmp = date("Y-m-dhisA");
        $saiz_fail = $_FILES['gambar']['size'];
        $nama_fail = basename($_FILES["gambar"]["name"]);
        $jenis_gambar = pathinfo($nama_fail, PATHINFO_EXTENSION);
        $lokasi = $_FILES['gambar']['tmp_name'];
        $nama_baru_gambar = "imagesEvent/" . $timestmp . "." . $jenis_gambar;

        if (move_uploaded_file($lokasi, $nama_baru_gambar)) {
            $imagePath = $nama_baru_gambar;
        } else {
            die("<script>alert('File upload failed.'); window.history.back();</script>");
        }
    } else {
        $imagePath = $currentImage; // Use the current image path if no new image is uploaded
    }

    $arahan_kemaskini = "UPDATE events SET eventName='$eventName', eventDetail='$eventDetail', eventPNG='$imagePath' WHERE eventID='$eventID'";

    if (mysqli_query($condb, $arahan_kemaskini)) {
        echo "<script>alert('Event Updated Successfully.'); window.location.href='manageeventspage.php';</script>";
    } else {
        echo "<script>alert('Event Update Failed.'); window.history.back();</script>";
    }
} else {
    // Fetch the event details to pre-fill the form
    if (isset($_GET['eventID'])) {
        $eventID = mysqli_real_escape_string($condb, $_GET['eventID']);
        $sql = "SELECT * FROM events WHERE eventID='$eventID'";
        $result = mysqli_query($condb, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $event = mysqli_fetch_assoc($result);
        } else {
            die("<script>alert('Event not found.'); window.location.href='manageeventspage.php';</script>");
        }
    } else {
        die("<script>alert('Invalid access.'); window.location.href='manageeventspage.php';</script>");
    }
}

mysqli_close($condb);
?>

<!DOCTYPE html>
<html>
<head>


    <title>Edit Event</title>
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
 
    /*-------=======================================================================--------------------------------------*/
	/*-------=======================================================================--------------------------------------*/
	
		

/*-------=======================================================================--------------------------------------*/
/*-------=======================================================================--------------------------------------*/

    </style>
</head>
<body  style="color: rgb(255, 255, 255); background-color: white;">

<div id="main">
    <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">HOME</a>
    <a href="#">LOCATION</a>
    <a href="#">MUSEUM</a>
    <a href="#">ABOUT</a>
</div>

<div class="topnav">
    <a href='adminpage.php'>HOME</a>
    <a href="managemuseumpage.php">MUSEUM</a>
    <a href="manageuserpage.php">USERS</a>
    <a class="active" href="managespotpage.php">SPOTLIGHT</a>
    <a class="b" href="logout.php">LOG OUT</a>
</div>

<div class="w3-container">
    <h3><b>Edit Event</b></h3>
</div>

<div class="line">
    <h1 class="events">Edit Event</h1>
    <div class="straightline"></div>

    <br>
    <form action="editevents.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="eventID" value="<?php echo htmlspecialchars($event['eventID']); ?>">
        <input type="hidden" name="currentImage" value="<?php echo htmlspecialchars($event['eventPNG']); ?>">

        <table>
            <tr>
                <td>Event Name:</td>
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="eventName" rows="4" cols="25"><?php echo htmlspecialchars($event['eventName']); ?></textarea></td>
            </tr>
            <tr>
                <td>Event Detail:</td>
                <td><textarea class="w3-input w3-animate-input" type="text" style="width:60%" name="eventDetail" rows="4" cols="25"><?php echo htmlspecialchars($event['eventDetail']); ?></textarea></td>
            </tr>
            <tr>
                <td>Current Image:</td>
                <td><img src="<?php echo htmlspecialchars($event['eventPNG']); ?>" alt="Event Image" class="table-img"></td>
            </tr>
            <tr>
                <td>New Image (optional):</td>
                <td><input class="w3-file" type="file" name="gambar" id="gambarE"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="w3-button w3-hover-light-green w3-green w3-border w3-border-light-green w3-round-large w3-block" value="Update"></td>
            </tr>
        </table>
    </form>
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
