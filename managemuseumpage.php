<?php
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <body>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</body>


<style>

	body { 
		background-image: url('black.png');
		background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center;
          background-size: cover;
          font-family: Arial, sans-serif;
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



	














	.line{
		border : 1px solid rgba(139, 139, 139, 0.878);
		margin-top: 100px;
		margin-bottom: 50px;
		margin-left: auto;
		margin-right: auto;
		border-radius: 25px;
		width : 90%;
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

		
		width: 700px;
		border-bottom: 1px solid grey;
		margin-left: auto;
		margin-right: auto;
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
	

    













</style>

</head>

<!------------------------------------------------------------------------------------>
<body style = 
	"color : rgb(255, 255, 255);
	background-color : white";
>

<?php
include('SideNavAdmin.php');
?>
  
	


<div class = "topnav">
	<a href = 'adminpage.php'>HOME</a>
	<a class = "active" href = "managemuseumpage.php">MUSEUM</a>
	<a href = "manageuserpage.php">USERS</a>
	<a href = "manageeventspage.php">EVENTS</a>
	<a href = 'managespotpage.php'>SPOTLIGHT</a>
	<a class ="w3-text-red" href = "logout.php">LOG OUT</a>
</div>


<!------------------------------------------------------------------------------------>

<div class="w3-container">
<h3><b>Manage Museums<b></h3>
</div>

<!------------------------------------------------------------------------------------>


<div class = "line">
	
	<h1 class = "events">Available museum in database</h1>

	<div class = "straightline"></div>

<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>


<?php
/*
	include('connection.php');

	# ---- bahagian untuk menyimpan data set_soalan baru

	# Menyemak kewujudan data POST
	if(!empty($_POST))
	{
    # Mengambil data POST
    $museumName  = mysqli_real_escape_string($condb,$_POST['museumName']);
    $museumLocation = mysqli_real_escape_string($condb,$_POST['museumLocation']);
	$museumDetail  	= mysqli_real_escape_string($condb,$_POST['museumDetail']);
    

   

    # menyemak kewujudan data yang diambil
    if( empty($museumName) or empty($museumLocation) or empty($museumDetail) or empty($eventID) or empty($invID) or empty($adminsID))
    {
        # jika terdapat pembolehubah yang tidak mempunyai nilai, aturcara akan diberhentikan
        die("<script>alert('Sila lengkapkan maklumat');
        window.location.href='managemuseumpage.php';</script>");
    }
	
	# Arahan untuk menyimpan data set_soalan baru
    $arahan_simpan="insert into museums
    (museumName,museumLocation,museumDetail,eventID,invID,adminsID)
    values
    ('$museumName','$museumLocation','$museumDetail','$eventID','$invID','$adminsID')";

    # Melaksanakan arahan untuk menyimpan data
    if(mysqli_query($condb,$arahan_simpan))
    {
        # data berjaya disimpan 
        echo "<script>alert('Pendaftaran BERJAYA.');
        window.location.href='managemuseumpage.php';</script>";
    }
    else
    {
        # data gagal disimpan 
         echo "<script>alert('Pendaftaran GAGAL.');
         window.location.href='managemuseumpage.php';
         </script>";
    }
}
*/
?>




<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>


<?php
	

    // Fetch all users from the database
    $sql = "SELECT * FROM museums";
    $result = mysqli_query($condb, $sql);

    if (!$result) {
        die('Error fetching data: ' . mysqli_error($condb));
    }

?>

    
    <table>
  
 
<!-- bahagian borang untuk mendaftar set soalan yang baru -->





<?php
    // Fetch museums from the database
    $sql = "SELECT * FROM museums"; // Adjust this to your table name
    $result = mysqli_query($condb, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>Museum ID</th><th>Museum Name</th><th>Location</th><th>Detail</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['museumID']) . '</td>';
            echo '<td>' . htmlspecialchars($row['museumName']) . '</td>';
            echo '<td>' . htmlspecialchars($row['museumLocation']) . '</td>';
            echo '<td>' . htmlspecialchars($row['museumDetail']) . '</td>';
           
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No museums found.</p>';
    }
    ?>
  
</table>

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





