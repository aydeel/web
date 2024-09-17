<?php
session_start();
include('connection.php');
include('guard.php');

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
          background-size: cover;
          font-family: Arial, sans-serif;
          color: #ffffff;
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
		width: 100%;
        max-width: 900px;
        margin: 20px auto;
		border-radius: 25px;
		height: 500px;
		max-height: 1000px;
		backdrop-filter: blur(2px) ;

	}
	.tajuk{
		color:white;


	}
	h3{
		font-size: 80px;
		width: 100%;
        max-width: 500px;
        margin-left : auto;
		margin-right : auto;
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
		width: 900px;
		border-bottom: 1px solid grey;
		margin-left: auto;
		margin-right : auto;
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



	.scrollable {
            height: calc(100% - 100px); /* Adjust based on the height of the header */
            overflow-y: auto;
        }



    </style>
</head>

<!------------------------------------------------------------------------------------>
<body style = "color : rgb(255, 255, 255); background-color : white">

<?php
include('SideNavAdmin.php');
?>
  
	


<div class = "topnav">
	<a  class = "active" href ='adminpage.php'>HOME</a>
	<a href = "managemuseumpage.php">MUSEUM</a>
	<a href = "manageuserpage.php">USERS</a>
	<a  href = "manageeventspage.php">EVENTS</a>
	<a href = "managespotpage.php">SPOTLIGHT</a>
	<a class ="w3-text-red" href = "logout.php">LOG OUT</a>
</div>




<!------------------------------------------------------------------------------------>

<div class = "tajuk">
<h3><b>Welcome, Admin <?php echo htmlspecialchars($_SESSION['username']); ?>!</b></h3>


</div>
<!------------------------------------------------------------------------------------>


<div class = "line">
	
	<h1 class = "events">Records</h1>

	<div class = "straightline"></div>

		
	<div class="scrollable">
		<?php
       // Fetch records from the database
	   $sql = "SELECT records.userID, records.museumID, records.recDate, records.recQuantity, records.recPrice, users.userName 
	   FROM records 
	   JOIN users ON records.userID = users.userID
	   Order by recDate Desc"; // Adjust this to your table names and join condition
		$result = mysqli_query($condb, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="w3-table w3-bordered">';
            echo '<tr><th>User ID</th>
			<th>User Name</th>
			<th>MuseumID</th>
			<th>Record Date and Time</th>
			<th>Quantity Tickets</th>
			<th>Total Fee</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
               
                echo '<td>' . htmlspecialchars($row['userID']) . '</td>';
				echo '<td>' . htmlspecialchars($row['userName']) . '</td>';
                echo '<td>' . htmlspecialchars($row['museumID']) . '</td>';
                echo '<td>' . htmlspecialchars($row['recDate']) . '</td>';
                echo '<td>' . htmlspecialchars($row['recQuantity']) . '</td>';
				echo '<td>' . htmlspecialchars($row['recPrice']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No records found.</p>';
        }
        ?>

	</div>

		

		


</div>




<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
</body>
</html>