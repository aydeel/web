<?php
session_start();
include('guard.php');
include('connection.php');

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<style>
	body { 
		background-image: url('black.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center; 
		background-size: cover;
		font-family: Arial;
		transition: none .5s;
		height: 100%;
	}

	html {
	 	scroll-behavior: smooth;
	}

	.topnav {
		overflow: hidden;
		background-color: none;
		margin: 10px 10px 0 10px;
		text-align: right;
	}

	.topnav a {
		display: inline-block;
		color: #f2f2f2;
		text-align: center;
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

	.ppmenari-container {
		content: "";
  		clear: both;
  		display: table;
		margin-left: auto;
		margin-right: auto;
	
	}

	.descppmenari-kiri {
		margin-right: 100px;
		float: left;
		width: 40%;
	}

	.gambarppmenari-kanan {
		margin-left: 50px;
		float: right;
		width: 40%;
		max-width: 800px;
	}

	.gambo{
		width: 100%;
		max-width: 500px; /* Set a maximum width */
		height: auto;
	}
	.pic{
		width: 100%;
		max-width: 350px; /* Set a maximum width */
		height: auto;
	}

	.btnbook a {
		cursor: pointer;
		background-color: #ffb74a;
  		color: rgb(255, 255, 255);
  		padding: 20px 60px;
		border-radius: 10px;
  		opacity: 0.9;
		margin:auto;
		display: block;
		text-decoration: none;
		font-weight: 600;
		width: fit-content;
	}

	.line {
		border: 1px solid rgba(139, 139, 139, 0.878);
		margin: 100px auto;
		border-radius: 25px;
		width: 80%;
		height: auto;
		backdrop-filter: blur(2px);
		padding: 20px;
	}

	.events {
		margin: 2%;
	}

	.gmbardandesc {
		content: "";
  		clear: both;
  		display: table;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 70px;
		width: 60%;
	}

	.gmba {
		float: left;
		width: 65%;


	}

	.descevent {
		float: right;
		color: rgb(221, 187, 255);
		max-width: 200px;
	}

	.straightline {
		width: 100%;
		border-bottom: 1px solid grey;
		margin: 50px 0;
	}

	#about {
        width: 90%;
        max-width: 1000px;
        border-top: 1px solid grey;
        margin: 350px auto;
        padding-top: 20px;
        text-align: center;
        word-spacing: 5px;
        letter-spacing: 4px;
    }
	

	.fa {
		padding: 20px;
		font-size: 30px;
		width: 30px;
		text-align: center;
		text-decoration: none;
		margin: 5px 2px;
		border-radius: 50%;
	}

	.fa:hover {
	    opacity: 0.7;
	}

	.fa-instagram {
		background: #125688;
		color: white;
	}

	.fa-google {
		background: #dd4b39;
		color: white;
	}

	.fa-facebook {
		background: #3B5998;
		color: white;
	}

	@media screen and (max-width: 768px) {
		.ppmenari-container, .line, #about {
			width: 100%;
		}

		.descppmenari-kiri, .gambarppmenari-kanan, .gmba, .descevent {
			float: none;
			width: 100%;
			margin: 0;
		}

		.gmbardandesc {
			margin: 20px 0;
		}
	}

	@media screen and (max-width: 600px) {
		.topnav a {
			font-size: 14px;
			padding: 10px 12px;
		}
	}


</style>
</head>












<body style="color: rgb(255, 255, 255); background-color: white;">

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
	<a class="active" href="mainpage.php">HOME</a>
	<a href="profileuser.php">USER</a>
	<a href="listmuseumpage.php">MUSEUM</a>
	<a href="#about">ABOUT</a>
	<a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>

<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-- -->

<div class = "w3-container">
<h1 class="w3-margin">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>



</div>


<!-- -=-==-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="ppmenari-container">
	<br><br><br><br><br><br><br>
	<h3> HIGHLIGHTS OF THE MONTHS </h3>

	<?php
	// Fetch events from the database
	$query1 = "SELECT invName, invDetail, invPNG FROM inventorys2 
	ORDER BY invID Desc
	LIMIT 1";
	$result1 = mysqli_query($condb, $query1);

	if ($result1) {
		while ($row1 = mysqli_fetch_assoc($result1)) {
			echo '<div class="descppmenari-kiri">';		
			echo '<h1 style="max-width: 1500px" class="w3-text-yellow "><b>' . htmlspecialchars($row1['invName']) . '</b></h1>';
			echo '<p style="max-width: 500px" style="max-height: 2000px">' . htmlspecialchars($row1['invDetail']) . '</p>';    
			echo '</div>';

			echo '<div class="gambarppmenari-kanan">';
			echo '<img src="' . htmlspecialchars($row1['invPNG']) . '" class="gambo">';
			echo '</div>';

			echo '</div>';
		}
	} else {
		echo '<p>No events found.</p>';
	}
	?>
	

<div class="line">
	<h1 class="events">EVENTS</h1>

	<!-- -==-=-=-=-=-=--=-=-=-=-= INI PHP -==-=-=-=-=-=--=-=-=-=-= -->
	<!-- -==-=-=-=-=-=--=-=-=-=-= INI PHP -==-=-=-=-=-=--=-=-=-=-= -->
	<!-- -==-=-=-=-=-=--=-=-=-=-= INI PHP -==-=-=-=-=-=--=-=-=-=-= -->
	<?php
    // Fetch events from the database
    $query = "SELECT eventName, eventPNG, eventDetail FROM events LIMIT 3";
    $result = mysqli_query($condb, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="gmbardandesc">';
            echo '<div class="gmba">';
            echo '<img src="' . htmlspecialchars($row['eventPNG']) . '" class="pic">';
            echo '</div>';
            echo '<div class="descevent">';
            echo '<h2>' . htmlspecialchars($row['eventName']) . '</h2>';
            echo '<p style="max-width: 500px">' . htmlspecialchars($row['eventDetail']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="straightline"></div>';
        }
    } else {
        echo '<p>No events found.</p>';
    }

    // Close the database connection
    mysqli_close($condb);
    ?>
	

	

	
</div>

<br><br><br>

<div class="btnbook">
	<a href="listmuseumpage.php">BOOK NOW</a>
</div>







<footer>

<div id="about">
    <h3>ABOUT</h3>
    <p>At [Your Museum Company], we are dedicated to preserving history and culture through captivating exhibitions and interactive experiences.
		We believe that understanding the past is key to comprehending the present and shaping the future. With our diverse and rich collections, 
		we invite visitors to embark on a journey through the epochs of human civilization, from prehistoric times to the modern era. 
		Our vision is to be a center of learning that inspires, fosters appreciation for cultural heritage, 
		and encourages reflection on the universal values that shape our world.</p>

    <div>
        <a href="#" class="fa fa-instagram"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-facebook"></a>
    </div>

</div>

</footer>








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