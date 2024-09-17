<!DOCTYPE html>
<html>
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
		font-family: Arial;
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
	
	












	.row1{
		content: "";
  		clear: both;
  		display: table;
		margin: auto;
	}
	.row2{
		content: "";
  		clear: both;
  		display: table;
		margin: auto;
	}
	.row3{
		content: "";
  		clear: both;
  		display: table;
		margin: auto;
	}
	img{
		opacity: 1;
		width : 300px;
		height: 200px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.museum{
		border :gba(139, 139, 139, 0.878);
		margin : 10px;
		width : 300px;
		height: 350px;
		float: left;
		transition: transform .2s;
	}
	.museum:hover {
		-ms-transform: scale(1.1); 
		-webkit-transform: scale(1.1); 
		transform: scale(1.1); 
	}
	.caption{
		margin-left: 15px;
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


















<body style = 
	"color : rgb(255, 255, 255);
	background-color : white;"
>




<?php
include('SideNav.php');
?>

<div class="topnav">
    <a href="mainpage.php">HOME</a>
    <a  href="profileuser.php">USER</a>
    <a class ="active" href="listmuseumpage.php">MUSEUM</a>
    <a href="#about">ABOUT</a>
    <a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>






<br><br><br><br><br><br>




<div class = "row1">
<br>
<br>
	<div class = "museum">
		
		<div class = "gambar">
         <a href = "purchasingmuseumpage.php">
			<img src = "imageMus/mush1.jpg">
			</a>
		</div>	
		<div class = caption>
			<h2>Nelayan Tanjung Balau Museum</h2>
		</div>

	</div>
		
	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">
        <img src = "imageMus/mush2.jpeg">
			</a>
		</div>	
		<div class = caption>
			<h2>Johor Bugis Museum</h2>
		</div>

	</div>

	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">
			<img src = "imageMus/mush3a.jpg">
			</a>
		</div>	
		<div class = caption>
			<h2>Kota Johor Lama Museum</h2>
		</div>

	</div>
</div>

<div class = "row2">

	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">

			<img src = "imageMus/mush4.png">
			</a>
		</div>	
		<div class = caption>
			<h2>Nanas Museum</h2>
		</div>

	</div>

	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">

			<img src = "imageMus/mush5a.jpg">
			</a>
		</div>	
		<div class = caption>
			<h2> Layang-Layang Museum</h2>
		</div>

	</div>

	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">

			<img src = "imageMus/mush6a.jpg">
			</a>
		</div>	
		<div class = caption>
			<h2> Warisan Tiong-Hua Museum</h2>
		</div>

	</div>
</div>

<div class = "row3">

	<div class = "museum" >
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">

			<img src = "imageMus/mush7a.jpeg">
			</a>
		</div>	
		<div class = caption>
			<h2>Museum diRaja Abu Bakar</h2>
		</div>

	</div>

	<div class = "museum">
		
		<div class = "gambar">
        <a href = "purchasingmuseumpage.php">

			<img src = "imageMus/mush8.jpg">
			</a>
		</div>	
		<div class = caption>
			<h2>Museum Kota Tinggi</h2>
		</div>

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