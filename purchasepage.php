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
        echo "<p>Error: One or more fields are empty.</p>";
    }

    $condb->close();
?>


    <!DOCTYPE html>
    <html>

    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            font-family: Arial, sans-serif;
            color: #ffffff;
        }

        .topnav {
            overflow: hidden;
            background-color: none;
            display: flex;
            float: right;
            justify-content: flex-end;
            margin: 0px 10px 0 60px;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a.active,
        .topnav a:hover {
            color: rgb(255, 181, 44);
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


        .button {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            text-align: center;
        
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

        .btnproceed:hover,
        .btncancel:hover {
            opacity: 1;
        }
        .straightline {
            width: 100%;
            border-bottom: 1px solid grey;
            margin: 30px 0;
        }
        table{
            border: 1px solid wheat;
        }
        th{
            border: 1px solid wheat;
            text-align: left;
            font-size: large;
        }
        td{
            border: 1px solid wheat;

        }
        .price{

            text-align: right;
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

    <br><br><br><br>




    <div class="line1">

        


    
            <!-- Purchase form -->
    <form action="purchasepage.php" method="POST">
        <label for="date-time-button">Choose Date and Time:</label>
        <input type="datetime-local" id="date-time-button" name="dateTime" required>
        <br>
        <label for="ticket-count">Number of Tickets:</label>
        <input type="number" id="ticket-count" name="ticketCount" min="1" required>
        <br>
        <label for="museumID">Choose Museum:</label>
        <select id="museumID" name="museumID" required>
        <option value="" selected disabled>Select a museum</option>








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


        <div class="straightline"></div>
        <div class="button">
            <a href="listmuseumpage.php" class="w3-button w3-round-xlarge w3-amber w3-hover-grey">Cancel</a>
            <button type="submit" class="btnproceed" >Proceed to Purchase </button>
            
        </div>
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
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
    </script>

    </body>
    </html>