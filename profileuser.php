<?php
session_start();
include('connection.php');
include('guard.php');

// Ensure the user is logged in
if (!isset($_SESSION['userID'])) {
    echo "<script>alert('Please log in first.'); window.location.href = 'loginpage.php';</script>";
    exit;
}

$userID = $_SESSION['userID'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = mysqli_real_escape_string($condb, $_POST['userName']);
    $userIC = mysqli_real_escape_string($condb, $_POST['userIC']);
    $userEmail = mysqli_real_escape_string($condb, $_POST['userEmail']);
    $userPhone = mysqli_real_escape_string($condb, $_POST['userPhone']);

    // Update the user data
    $sql = "UPDATE users SET userName='$userName', userIC='$userIC', userEmail='$userEmail', userPhone='$userPhone' WHERE userID='$userID'";

    if (mysqli_query($condb, $sql)) {
        echo "<script>alert('Data Successfully Updated, Changes Will Be Taken In The Next Log In'); window.location.href = 'profileuser.php';</script>";
    } else {
        echo "<script>alert('Data Update Failed'); window.history.back();</script>";
    }
} else {
    // Fetch the current data for the user
    $sql = "SELECT * FROM users WHERE userID='$userID'";
    $result = mysqli_query($condb, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("<script>alert('User Not Found'); window.history.back();</script>");
    }
}
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
    html {
        scroll-behavior: smooth;
    }
    body {
        background-image: url('black.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        font-family: Arial, sans-serif;
        color: #ffffff;
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

























    #main {
        transition: margin-left .5s;
        padding: 16px;
        width: 50%;
        position: absolute;
    }
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
        .sidenav a {
            font-size: 18px;
        }
    }
    .line1 {
        border: 0.5px solid white;
        border-radius: 20px;
        width: 100%;
        max-height: 900px;
        max-width: 700px;
        margin: 20px auto;
        backdrop-filter: blur(2px);
        padding: 20px;
        padding-left: 40px;
        padding-right: 40px;
    }
    input[type=text], input[type=email] {
        width: 100%;
        padding: 17px;
        margin: 30px 0 7px 0;
        border-radius: 20px;
        background-color: rgba(0,0,0, 0.4);
        color: white;
        outline: none;
    }
    .btnsubmit {
        margin-top: 70px;
        background-color: #ffb74a;
        color: rgb(255, 255, 255);
        padding: 16px 20px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        font-weight: 900;
    }
    .btnsubmit:hover {
        opacity: 3;
    }
	.straightline{
		width: 100%;
		max-width:800px;
		border-bottom: 1px solid grey;
		margin:30px auto ;
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
        padding: 15px;
        font-size: 30px;
        width: 60px;
        text-align: center;
        text-decoration: none;
        margin:auto;
        border-radius: 100px;
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
</style>
</head>

<body>












<?php
include('SideNav.php');
?>

<div class="topnav">
	<a  href="mainpage.php">HOME</a>
	<a class="active" href="profileuser.php">USER</a>
	<a href="listmuseumpage.php">MUSEUM</a>
	<a href="#about">ABOUT</a>
	<a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>

<br><br><br><br>

<div class="line1">
    <div class="w3-container">
        <h3><b>PROFILE EDIT</b></h3>
        <div class = "straightline"></div>
        
        <form method="POST" action="">
            <input type="hidden" name="userID" value="<?php echo htmlspecialchars($data['userID']); ?>">
            <p>
                <label>Name</label>
                <input class="w3-input" type="text" name="userName" value="<?php echo htmlspecialchars($data['userName']); ?>" required>
            </p>
            <p>
                <label>IC</label>
                <input class="w3-input" type="text" name="userIC" value="<?php echo htmlspecialchars($data['userIC']); ?>" required>
            </p>
            <p>
                <label>Email</label>
                <input class="w3-input" type="email" name="userEmail" value="<?php echo htmlspecialchars($data['userEmail']); ?>" required>
            </p>
            <p>
                <label>Phone</label>
                <input class="w3-input" type="text" name="userPhone" value="<?php echo htmlspecialchars($data['userPhone']); ?>" required>
            </p>
            <p>
                <button type="submit" class="btnsubmit">UPDATE</button>
            </p>
        </form>
    </div>
</div>

<footer>

<?php
include("footers.php");

?>
</footer>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>
</body>
</html>
