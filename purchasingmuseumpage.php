<?php
    session_start();
    if (!isset($_SESSION['userID'])) {
        // Redirect to login page if the user is not logged in
        header("Location: login.php");
        exit();
    }

    include 'connection.php';

    $userID = $_SESSION['userID'];
    $dateTime = isset($_POST['dateTime']) ? $_POST['dateTime'] : null;
    $ticketCount = isset($_POST['ticketCount']) ? $_POST['ticketCount'] : null;
    $museumID = isset($_POST['museumID']) ? $_POST['museumID'] : null;
    $totalCost = $ticketCount * 5; // Assuming the price per ticket is 5

    if ($dateTime && $ticketCount && $museumID) {
        // Insert the purchase information into the database
        $stmt = $condb->prepare("INSERT INTO records (userID, museumID, recDate, recQuantity, recPrice) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issid", $userID, $museumID, $dateTime, $ticketCount, $totalCost);

        if ($stmt->execute()) {
            // Set session variables to carry data to receiptpage.php
            $_SESSION['purchaseDetails'] = [
                'userID' => $userID,
                'museumID' => $museumID,
                'recDate' => $dateTime,
                'recQuantity' => $ticketCount,
                'recPrice' => $totalCost
            ];

            // Redirect to receipt page
            header("Location: receiptpage.php");
            exit();
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {

    }

    $condb->close();
?>


<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">




<style>



      body {
          background-image: url('black.png');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-position: center;
          background-size: cover;
          font-family: Arial, sans-serif;
          color: #ffffff;
          position: relative;    
          animation: mymove 2s;    
          animation-fill-mode: forwards;

      }
      @keyframes mymove {
      from {top: 0px;}
      to {top: 10px; opacity: 1;}
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
          width: 90%;
          max-width: 900px;
          margin: 20px auto;
          backdrop-filter: blur(2px);
          padding: 20px;
      }
      .line2 {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          border-radius: 20px;
          width: 90%;
          max-width: 900px;
          margin: 20px auto;
          backdrop-filter: blur(2px);
          padding: 20px;
      }

      .straightline {
		width: 100%;
		border-bottom: 1px solid grey;
		margin: 50px auto;
	}

      .museum1 {
          display: block;
          margin-left: auto;
          margin-right: auto;
      }

      img {
          margin-top: 40px;
          opacity: 1;
          width: 100%;
          max-width: 500px;
      }

      .gambar{
          width: 50%;
          margin:auto;
          display: block;
      }

      .descevents {
          color: rgb(221, 187, 255);
          text-align: center;
          margin: 20px 0;
      }

      .button {
          text-align: right;
          margin-top: 50px;
      }

      .btnproceed,
      .btncancel {
          background-color: #818181;
          color: #fff;
          padding: 16px 20px;
          border-radius: 10px;
          cursor: pointer;
          font-weight: 900;
          margin: 5px;
          opacity: 0.9;
      }

      .btnproceed {
          background-color: #ffb74a;
      }
      .btncancel {
          background-color: red;
          text-decoration: none;
      }

      .btnproceed:hover,
      .btncancel:hover {
          opacity: 1;
      }

      




       


    	/*kotak*/
    	.dropdown-content {
            margin-bottom: 50px;
    		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    		z-index: 1;
    		color: antiquewhite;
    		border-radius: 10px;
            background-color: red;
    	}

    	.calendar {
            width: 80%;
    		display: grid;
    		grid-template-columns: repeat(7, 1fr);
    		gap: 5px;
    		text-align: center;
    		margin-bottom: 10px;
            margin: auto;
    	}

    	.calendar div {
    		padding: 10px;
    		cursor: pointer;
    	}

    	.calendar div:hover {
    		background-color: antiquewhite;
            color: brown;
    		border-radius: 10px;
    	}

    	.calendar .header {
    		font-weight: bold;
            color : darkkhaki;
    	}

    	.calendar .days {
    		grid-column: span 10;
    		display: grid;
    		grid-template-columns: repeat(7, 1fr);
    	}

    	.nav-buttons {
            margin-top: 10px;
    		grid-column: span 7;
    		display: flex;
    		justify-content: space-between;
    		align-items: center;

    	}


    	.time-picker {
            width: 80%;
    		display: flex;
    		justify-content: space-between;
            margin: auto;
    	}

    	.time-picker select {
    		padding: 5px;
    		margin-right: 5px;
    		border: none;
    		border-radius: 4px;
    		margin : 3%;
    	}

    	/* New styles for the button */
    	#date-time-button {

            margin : 10px auto;
            margin-bottom:20px;
    		padding: 10px 20px;
    		font-size: 16px;
    		background-color:antiquewhite;
    		color: brown;
    		border: none;
    		border-radius: 5px;
    		cursor: pointer;
    		transition: background-color 0.3s;

    	}

    	#date-time-button:hover {
    		background-color: brown;
    		color: antiquewhite;
    	}

    	/* Show dropdown content */
    	.show {
    		display: block;
    	}


    	#ticket-count{

        margin : 10px auto;
        margin-bottom:20px;
        padding: 10px 20px;
        font-size: 16px;
        background-color:antiquewhite;
        color: brown;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;

        }

        #museumID{
            max-width: 250px;
            margin : 10px auto;
            margin-bottom:20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color:antiquewhite;
            color: brown;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;

        }

        .containerselect{
            margin:auto;
            width: 100%;
            max-width: 250px;
        }




    /*====================================================*/
    /*====================================================*/
    /*====================================================*/

    
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




      /**-=-=-=-=-==-=-=-=-=-=-=--=-=-=-===-=- */ 


        
              /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }
        
        /* Next & previous buttons */
        


         .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin: auto;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
          user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }

        .prev {
          left: 0;
          border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          cursor: pointer;
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active, .dot:hover {
          background-color: #717171;
        }
        
        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .prev, .next,.text {font-size: 11px}
        }
        
        table{
            border: 1px solid wheat0;
            margin: auto;
            margin-top: 30px;
            max-width:100%;
            width: 800px;
            vertical-align: text-top;
            margin-bottom: 50px;
            overflow-x:auto;
        }
	    th{
            border: 1px solid wheat0;
            font-size: x-large;
            vertical-align: top;
            text-align: left;
        }
        td{
            border: 1px solid wheat0;
            font-size: medium;
            max-width: 500px;
        }

</style>
</head>











<?php
include('SideNav.php');
?>

<div class="topnav">
    <a href="mainpage.php">HOME</a>
    <a  href="profileuser.php">USER</a>
    <a href="listmuseumpage.php">MUSEUM</a>
    <a href="#about">ABOUT</a>
    <a class="w3-text-red" href="logout.php">LOG OUT</a>
</div>

















<br><br><br><br><br><br>

















<div class="line1">


                    <div class="slideshow-container w3-center">
    


                        <div class="mySlides fade"><!--slide1-->
                        <div class="numbertext">1 / 8</div>

                                <div class="line2">

       
                                        <div class="slideshow-container w3-center">
                                            <img src="imgH1/h1a.jpg" style="width:100%">
                                        </div>
                                              
        

                                        <h1 class="w3-text-white w3-center w3-margin"><b>Nelayan Tanjung Balau Museum</b></h>
                                        
                                        <div style="overflow-x:auto;">
                                        <table style="width:70% ">

                                            <tr>
                                                <th>DESCRIPTION</th>
                                                <td>
                                                Located in Tanjung Balau, this museum is dedicated to the rich maritime heritage of Malaysia. It showcases traditional fishing techniques and equipment used by local fishermen, including nets, traps, and boats. Visitors can learn about the challenges faced by fishermen and the cultural significance of fishing in the region.
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>OPENING TIME</th>
                                                <td>10:00 AM - 4:00 PM</td>
                                            </tr>

                                            <tr>
                                                <th>LOCATION</th>
                                                <td><a href="https://www.google.com/maps/dir//Muzium+Nelayan+Tanjung+Balau+(Fishermen+Museum),+Kompleks+Pelancongan,+Tanjung+Balau,+81930+Kota+Tinggi,+Johor/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x31da4d68ad7b6a49:0x8ef7de3831185478?sa=X&ved=1t:57443&ictx=111">Kompleks Pelancongan, Tanjung Balau, 81930 Kota Tinggi, Johor</td>
                                            </tr>

                                            <tr>
                                                <th>PRICE</th>
                                                <td>RM 5</td>
                                            </tr>

                                            <tr>
                                                <th>CONTACT</th>
                                                <td>Encik Ahmad, +60 7-832 7691</td>
                                            </tr>

                                        </table>
                                        </div>

                                </div>
                        </div><!--slide1--->

                    



                                <div class="mySlides fade"><!--slide2-->
                                <div class="numbertext">2 / 8</div>

                                                <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH2/h2a.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Johor Bugis Museum</b></h>
                                                    
                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            This museum celebrates the history and culture of the Bugis community in Johor. It features artifacts, traditional costumes, and historical documents that highlight the migration and influence of the Bugis people. Visitors can explore the unique traditions, language, and contributions of the Bugis to Johor's cultural tapestry.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>11:00 AM - 5:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir/2.4869724,102.7250041/Muzium+Bugis,+Kampung+Rambah,+82000+Rambah,+Johor/@1.9671019,102.3691202,9z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31d0a3b1e8c5f651:0xd57d2466e28b291b!2m2!1d103.4117978!2d1.4280325?entry=ttu">Muzium Bugis, Kampung Rambah, 82000 Rambah, Johor</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Puan Siti, +60 7-224 4333</td>
                                                        </tr>

                                                    </table>

                                                </div>
                                </div><!--slide2--->

                                    



                                
                                <div class="mySlides fade"><!--slide3-->
                                    <div class="numbertext">3 / 8</div>
                                    <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH3/h3e.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Kota Johor Lama Museum</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            Situated at the site of the old Johor Sultanate, this museum provides insights into the region's historical importance. It houses artifacts from the Johor Lama period, including weapons, pottery, and coins. The museum narrates the story of the old fort and its role in defending Johor against various invasions.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>9:30 AM - 3:30 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir//Kampong+Johor+Lama,+81900+Kota+Tinggi,+Johor/@1.5806503,103.9353675,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31da446d00000001:0x72383b6bd4f4e9ab!2m2!1d104.0176876!2d1.5806028?entry=ttu">Kampong Johor Lama, 81900 Kota Tinggi, Johor</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Puan Siti, +60 7-224 4333</td>
                                                        </tr>

                                                    </table>

                                                    </div>


                                </div><!---slide3-->

















                                <div class="mySlides fade"><!--slide4-->
                                    <div class="numbertext">4 / 8</div>
                                    <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH4/h4b.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Nanas Museum</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            The Pineapple Museum, located in Johor, delves into the pineapple industry that has been a crucial part of the state’s economy. Exhibits detail the history, cultivation techniques, and processing of pineapples. Visitors can learn about the different pineapple varieties and the industry’s impact on the local community.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>10:00 AM - 4:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir/2.4869724,102.7250041/Muzium+Bugis,+Kampung+Rambah,+82000+Rambah,+Johor/@1.9671019,102.3691202,9z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31d0a3b1e8c5f651:0xd57d2466e28b291b!2m2!1d103.4117978!2d1.4280325?entry=ttu">Jalan Pontian, Pekan Nanas, Johor, 81500, Pekan Nenas, Johor, 81500</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Encik Rahim, +60 7-697 7070</td>
                                                        </tr>

                                                    </table>

                                                    </div>

                                </div><!--slide4--->


                                <div class="mySlides fade"><!--slide5-->
                                    <div class="numbertext">5 / 8</div>
                                    <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH5/h5a.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Museum Layang-layang</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            Experience the beauty of kite flying at the International Kite Festival. The event showcases a stunning array of traditional and modern kites from around the world. Participate in kite-making workshops and watch expert demonstrations of intricate kite designs. Competitions for the most creative kites will be held, with categories for all age groups. Learn about the cultural significance of kites in Malaysia and their role in festivals and competitions. Enjoy a fun day filled with colorful kites soaring in the sky.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>10:00 AM - 5:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir//Jln+Kota,+Banda+Hilir,+75000+Melaka/@2.1917444,102.1667299,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31d1f1e0ad4daa0d:0xa84889ec4bed95f1!2m2!1d102.2491319!2d2.1917467?entry=ttu">Kite Museum, Jln Kota, Banda Hilir, 75000 Malacca</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Puan Aishah, +60 7-822 1000</td>
                                                        </tr>

                                                    </table>

                                                    </div>

                                </div><!--slide5--->

                                <div class="mySlides fade"><!--slide6-->
                                    <div class="numbertext">6 / 8</div>
                                    <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH6/h6a.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Warisan Tiong Hua Museum</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            Celebrate the rich heritage of the Chinese community in Johor with Tiong-Hua Heritage Day. The event features traditional music and dance performances, as well as workshops on calligraphy and paper cutting. Participate in a traditional tea ceremony and explore exhibits that highlight the contributions of the Chinese community to Johor’s development. Enjoy authentic Chinese snacks and learn about Chinese festivals, family life, and cultural traditions through interactive displays.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>11:00 AM - 4:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir/2.4869724,102.7250041/Muzium+Bugis,+Kampung+Rambah,+82000+Rambah,+Johor/@1.9671019,102.3691202,9z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31d0a3b1e8c5f651:0xd57d2466e28b291b!2m2!1d103.4117978!2d1.4280325?entry=ttu">Muzium Bugis, Kampung Rambah, 82000 Rambah, Johor</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Puan Siti, +60 7-224 4333</td>
                                                        </tr>

                                                    </table>

                                                    </div>

                                </div><!--slide6--->

                                <div class="mySlides fade"><!--slide7-->
                                    <div class="numbertext">7 / 8</div>
                                    <div class="line2 " id="H7">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH7/h7a.jpeg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Museum di-Raja Abu Bakar</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            This royal museum commemorates the legacy of Sultan Abu Bakar, the "Father of Modern Johor." It features personal items, royal regalia, and historical documents that provide insight into his reign and modernization efforts. The museum highlights his contributions to education, infrastructure, and governance.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>9:00 AM - 4:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir//Istana+Besar,+Taman+Istana,+80000+Johor+Bahru,+Johor/@1.455,103.7537891,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31da12ebbf94a925:0x16ef62e4bd85473d!2m2!1d103.756364!2d1.455?entry=ttu">Istana Besar Royal Abu Bakar, Taman Istana, 80000 Johor Bahru, Johor</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Puan Noor, +60 7-223 055</td>
                                                        </tr>

                                                    </table>

                                                    </div>
                                </div><!--slide7--->

                                <div class="mySlides fade"><!--slide8-->
                                    <div class="numbertext">8 / 8</div>
                                    <div class="line2">


                                                    <div class="slideshow-container w3-center">
                                                        <img src="imgH8/h8d.jpg" style="width:100%">
                                                    </div>
                                                        


                                                    <h1 class="w3-text-white w3-center "><b>Musuem Kota Tinggi</b></h>

                                                    <table style="width:60%">

                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <td>
                                                            Located in the heart of Kota Tinggi, this museum chronicles the region's history, focusing on its role in the Johor Sultanate. The exhibits include archaeological finds, historical artifacts, and displays about the local culture and traditions. It offers visitors a comprehensive look at Kota Tinggi's rich heritage.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>OPENING TIME</th>
                                                            <td>10:00 AM - 3:00 PM</td>
                                                        </tr>

                                                        <tr>
                                                            <th>LOCATION</th>
                                                            <td><a href="https://www.google.com/maps/dir//Kampung+Makam,+81900+Kota+Tinggi,+Johor/@1.7371765,103.8296407,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31da6081b1a9317d:0x6a8cdae80f7be1d3!2m2!1d103.9122753!2d1.7374217?entry=ttu">Kota Tinggi Museum, Kampung Makam, 81900 Kota Tinggi, Johor</td>
                                                        </tr>

                                                        <tr>
                                                            <th>PRICE</th>
                                                            <td>RM 5</td>
                                                        </tr>

                                                        <tr>
                                                            <th>CONTACT</th>
                                                            <td>Encik Faizal, +60 7-883 4313</td>
                                                        </tr>

                                                    </table>

                                                    </div>

                                </div><!--slide8--->



                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
            




                                <div style="text-align:center">
                                <span class="dot" onclick="currentSlide(1)"></span> 
                                <span class="dot" onclick="currentSlide(2)"></span> 
                                <span class="dot" onclick="currentSlide(3)"></span> 
                                </div>

                                <div class="straightline"></div>

                <!-- Purchase form -->
                <form action="purchasepage.php" method="POST">

              
                <div class = "containerselect">

                    <label for="date-time-button">CHOOSE DATE AND TIME:</label>
                    <input type="datetime-local" id="date-time-button" name="dateTime" required>

                    <br>

                    <label for="ticket-count">NUMBER OF TICKET:</label>
                    <input type="number" id = "ticket-count" name = "ticketCount" min ="1" required>
                    
                    <br>

                    <label for="museumID">CHOOSE MUSEUM:</label>

                    <select id="museumID" name="museumID" required>
                    <option value = "" selected disabled>Select a museum</option>
                    <!-- Populate options from museums table -->
                    <?php
                    include 'connection.php'; // Adjust this to your database connection script

                    $sql_museums = "SELECT * FROM museums";
                    $result_museums = mysqli_query($condb, $sql_museums);

                    while ($row = mysqli_fetch_assoc($result_museums)) {
                        echo "<option value='" . $row['museumID'] . "'>" . htmlspecialchars($row['museumName']) . "</option>";
                    }
                    ?>
                    </select>

                    <br>

                </div>

                    <div class="button">
                        <a href="listmuseumpage.php" class = "btncancel">Cancel</a>
                        <button type="submit" class="btnproceed" >Proceed to Purchase </button>
                    </div>



</div><!--line1--->




</div>




 



















































<footer>

<?php
include("footers.php");

?>
</footer>

















<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('date-time-button');
    const dropdownContent = document.getElementById('dropdown-content');
    const calendar = document.getElementById('calendar');
    const hourSelect = document.getElementById('hour-select');
    const minuteSelect = document.getElementById('minute-select');
    const amPmSelect = document.getElementById('am-pm-select');

    let selectedDate = null;

    // Toggle the dropdown content when the button is clicked
    button.addEventListener('click', function(event) {
        dropdownContent.classList.toggle('show');
        event.stopPropagation();  // Prevent click event from propagating to document
    });

    // Close the dropdown content when clicking outside of it or on the calendar
    document.addEventListener('click', function(event) {
        if (!dropdownContent.contains(event.target) && event.target !== button) {
            dropdownContent.classList.remove('show');
        }
    });

    // Close the dropdown content after selecting date or time
    function closeDropdown() {
        dropdownContent.classList.remove('show');
    }

    // Function to update the selected date
    function selectDate(day, month, year) {
        selectedDate = `${day} ${month} ${year}`;
        updateButton();
        closeDropdown(); // Close dropdown after selecting date
    }

    // Update the button text based on selected date and time
    function updateButton() {
        const selectedHour = hourSelect.value;
        const selectedMinute = minuteSelect.value;
        const selectedAmPm = amPmSelect.value;
        button.textContent = `${selectedDate} ${selectedHour}:${selectedMinute} ${selectedAmPm}`;
    }

    // Event listeners for hour, minute, and AM/PM selects
    hourSelect.addEventListener('change', updateButton);
    minuteSelect.addEventListener('change', updateButton);
    amPmSelect.addEventListener('change', updateButton);

    // Event delegation for calendar days
    calendar.addEventListener('click', function(event) {
        if (event.target.classList.contains('calendar-day')) {
            const day = event.target.textContent;
            const month = calendar.dataset.month;
            const year = calendar.dataset.year;
            selectDate(day, month, year);
        }
    });

    // Function to create calendar
    function createCalendar(month) {
        calendar.innerHTML = '';

        const monthNames = ["January", "February", "March", "April", "May", "June", 
                            "July", "August", "September", "October", "November", "December"];

        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();

        const navButtons = document.createElement('div');
        navButtons.className = 'nav-buttons';
        const prevButton = document.createElement('button');
        prevButton.textContent = '<';
        prevButton.onclick = () => {
            createCalendar((month - 1 + 12) % 12);
        };
        const nextButton = document.createElement('button');
        nextButton.textContent = '>';
        nextButton.onclick = () => {
            createCalendar((month + 1) % 12);
        };
        const monthLabel = document.createElement('div');
        monthLabel.textContent = `${monthNames[month]} ${currentYear}`;
        navButtons.appendChild(prevButton);
        navButtons.appendChild(monthLabel);
        navButtons.appendChild(nextButton);
        calendar.appendChild(navButtons);

        const headers = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        headers.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'header';
            dayElement.textContent = day;
            calendar.appendChild(dayElement);
        });

        const firstDay = new Date(currentYear, month, 1).getDay();
        const daysInMonth = new Date(currentYear, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            calendar.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';
            dayElement.textContent = day;
            calendar.appendChild(dayElement);
        }

        calendar.dataset.month = monthNames[month];
        calendar.dataset.year = currentYear;
    }

    // Function to populate time selectors
    function populateTimeSelectors() {
        // Populate hour select (1 to 12 for AM/PM format)
        for (let i = 1; i <= 12; i++) {
            const hourOption = document.createElement('option');
            hourOption.value = i;
            hourOption.textContent = i;
            hourSelect.appendChild(hourOption);
        }

        // Populate minute select (00 to 59)
        for (let i = 0; i < 60; i++) {
            const minuteOption = document.createElement('option');
            minuteOption.value = i;
            minuteOption.textContent = i < 10 ? `0${i}` : i;
            minuteSelect.appendChild(minuteOption);
        }
    }

    // Call function to populate time selectors
    populateTimeSelectors();

    // Initialize calendar for current month
    const currentMonth = new Date().getMonth();
    createCalendar(currentMonth);
});

</script>

<script>
        document.addEventListener('DOMContentLoaded', () => {
            const minusButton = document.getElementById('minus');
            const plusButton = document.getElementById('plus');
            const ticketCount = document.getElementById('ticket-count');

            minusButton.addEventListener('click', () => {
                let count = parseInt(ticketCount.value);
                if (count > 1) {
                    ticketCount.value = count - 1;
                }
                updateButtons();
            });

            plusButton.addEventListener('click', () => {
                let count = parseInt(ticketCount.value);
                if (count < 30) {
                    ticketCount.value = count + 1;
                }
                updateButtons();
            });

            function updateButtons() {
                let count = parseInt(ticketCount.value);
                minusButton.disabled = count <= 1;
                plusButton.disabled = count >= 30;
            }

            updateButtons();
        });

    </script>






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




<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


</body>
</html>




