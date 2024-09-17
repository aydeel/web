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
          color: #ffffff;
		transition:  none .5s;
		background-image: cover;
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
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 50px;
		border-radius: 25px;
		width : 90%;
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
		max-width : 1200px;
		width: 100%;
		border-bottom: 1px solid grey;
		margin-left: auto;
		margin-right:auto;
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
	form {
            position: relative;
            width: 40%;
			height: 50px;
            margin: 20px auto;
            background: grey;
            border-radius: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			font-size: 12px;
			text-align: center;
            display: flex;
        }

        input[type="search"] {
            width: 100%;
            padding: 10px 20px;
            border: none;
            border-radius: 50px 0 0 50px;
            outline: none;
			
            font-size: 12px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #45a049;
        }

		

/*-------=======================================================================--------------------------------------*/
/*-------=======================================================================--------------------------------------*/

    </style>
</head>

<!------------------------------------------------------------------------------------>
<body style = 
	"color : rgb(255, 255, 255);
	background-color : white";
>

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
  
	


<div class = "topnav">
<a  href='adminpage.php'>HOME</a>
<a href = "managemuseumpage.php">MUSEUM</a>
	<a class = "active" href = "manageuserpage.php">USERS</a>
	<a href = "manageeventspage.php">EVENTS</a>
	<a href = "managespotpage.php">SPOTLIGHT</a>
	<a class ="w3-text-red" href = "logout.php">LOG OUT</a>
</div>



<!------------------------------------------------------------------------------------>

<div class="w3-container">
<h3><b>Manage Users<b></h3>
</div>



<!------------------------------------------------------------------------------------>
<!-------------------------------SEARCH BARR------------------------------------------>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>


<div class = "line">
	
	<h1 class = "events">Logged Users</h1>

	<div class = "straightline"></div>

	
	<div class="w3-container w3-center">
        <form method="GET" action="manageuserpage.php" role="search">
            <input id="search" type="search" name="search" placeholder="Search Name" autofocus required />
            <button type="submit">Go</button>
        </form>


		<a href = "manageuserpage.php">RESET</a>
    </div>

	<br>



	<?php
    include('connection.php'); // Ensure this includes your database connection script

    $searchQuery = '';
    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($condb, $_GET['search']);
        $searchQuery = " WHERE userName LIKE '%$search%' OR userEmail LIKE '%$search%' OR userPhone LIKE '%$search%' OR userIC LIKE '%$search%'";
    }

    // Fetch users based on search query or fetch all if no search
    $sql = "SELECT * FROM users" . $searchQuery;
    $result = mysqli_query($condb, $sql);

    if (!$result) {
        die('Error fetching data: ' . mysqli_error($condb));
    }
    ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>IC</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php
        // Loop through each row of data fetched from the database
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['userID']) . "</td>";
            echo "<td>" . htmlspecialchars($data['userName']) . "</td>";
            echo "<td>" . htmlspecialchars($data['userIC']) . "</td>";
            echo "<td>" . htmlspecialchars($data['userEmail']) . "</td>";
            echo "<td>" . htmlspecialchars($data['userPhone']) . "</td>";
            echo "<td>
			<a href='remove.php?userID=" . $data['userID'] . "&jadual=users&medan=userID' onclick=\"return confirm('Are you sure you want to delete this user?')\">Delete</a>
			</td>";
			echo "</tr>";
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





