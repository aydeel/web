<?php
    session_start();
    if (!isset($_SESSION['purchaseDetails'])) {
        // Redirect to purchase page if session variables are not set
        header("Location: purchasepage.php");
        exit();
    }

    $purchaseDetails = $_SESSION['purchaseDetails'];

    // Clear the session variables after use (optional)
    unset($_SESSION['purchaseDetails']);
    session_write_close(); // Optional: Close the session to release the session file lock

    // Display receipt details
    $userID = $purchaseDetails['userID'];
    $museumID = $purchaseDetails['museumID'];
    $recDate = $purchaseDetails['recDate'];
    $recQuantity = $purchaseDetails['recQuantity'];
    $recPrice = $purchaseDetails['recPrice'];

    // Retrieve user's name and museum name from the database
    include 'connection.php';

    $stmt_user = $condb->prepare("SELECT userName FROM users WHERE userID = ?");
    $stmt_user->bind_param("i", $userID);
    $stmt_user->execute();
    $stmt_user->bind_result($userName);
    $stmt_user->fetch();
    $stmt_user->close();

    $stmt_museum = $condb->prepare("SELECT museumName FROM museums WHERE museumID = ?");
    $stmt_museum->bind_param("s", $museumID);
    $stmt_museum->execute();
    $stmt_museum->bind_result($museumName);
    $stmt_museum->fetch();
    $stmt_museum->close();

    $condb->close();
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
		font-family: Arial;
		transition:  none .5s;
	}










	.topnav {
		overflow: auto;
		background-color: none;
		margin-top: 10px;
		margin-left: 60px;
		float:right;
		margin-right: 10px;
	}
	.topnav a {
		float: left;
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
	#main {
          transition: margin-left .5s;
          padding: 16px;
    		width: 50%;
    		position: absolute;
      }
      @media (max-width: 768px) {
        .topnav {
            flex-direction: column;
            align-items: flex-start;
        }

        .topnav a {
            padding: 10px;
            font-size: 15px;
        }

        .museum1 {
            flex-direction: column;
        }

        .button {
            text-align: center;
            margin-top: 20px;
        }
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
		width: 100%;
		max-width:800px;
		border-bottom: 1px solid grey;
		margin:10px auto ;
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
    margin-left: 100px;
	}


    /* -=-=-=-=-=-=-=-=-=-=-=-=-=RECEIPT-=-=-=-=-=-=-=-=-=-=-=-=-= */
    /* -=-=-=-=-=-=-=-=-=-=-=-=-=RECEIPT-=-=-=-=-=-=-=-=-=-=-=-=-= */
    /* -=-=-=-=-=-=-=-=-=-=-=-=-=RECEIPT-=-=-=-=-=-=-=-=-=-=-=-=-= */

.receipt {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.receipt h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

.receipt p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 10px;
    color: black;
}

.receipt strong {
    font-weight: bold;
    margin-right: 5px;


}
.btnreceipt{
	margin: 50px auto;
	background-color: #ffb74a;
	color: #fff;
	padding: 16px 20px;
	border-radius: 10px;
	cursor: pointer;
	font-weight: 900;

	opacity: 0.9;
	width:100%;
	max-width:900px;
}


.line1 {
          border: 0.5px solid white;
          border-radius: 20px;
          width: 90%;
          max-width: 900px;
          margin: 90px auto;
          backdrop-filter: blur(2px);
          padding: 20px;
      }
.tajuk{
	margin:auto 40px;
	
}




    </style>
</head>















<!------------------------------------------------------------------------------------>
<body style = 
	"color : rgb(255, 255, 255);
	background-color : white";
>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div id="main">
    <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

<div class="topnav">
    <a href="mainpage.php">HOME</a>
    <a  href="profileuser.php">USER</a>
    <a href="listmuseumpage.php">MUSEUM</a>
    <a href="#about">ABOUT</a>
    <a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>



<!------------------------------------------------------------------------------------>

<div class = "w3-container">


</div>
<!------------------------------------------------------------------------------------>


<div class = "line1">
	
	<h1 class = "tajuk"><b>RECEIPT</b></h1>

	<div class = "straightline"></div>

<br><br><br><br>

    <div class="receipt">
    <h1>Purchase Receipt</h1>
        <p><strong>User Name:</strong> <?php echo htmlspecialchars($userName); ?></p>
        <p><strong>Museum Name:</strong> <?php echo htmlspecialchars($museumName); ?></p>
        <p><strong>Date and Time:</strong> <?php echo htmlspecialchars($recDate); ?></p>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($recQuantity); ?></p>
        <p><strong>Total Price:</strong> RM <?php echo number_format($recPrice, 2); ?></p>
    </div>



<button onclick="window.print()" class="btnreceipt"> Get Receipt </button>
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