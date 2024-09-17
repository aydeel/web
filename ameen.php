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
        justify-content: flex-end;
        margin: 10px 10px 0 60px;
    }

    .topnav a {
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

    .museum1 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    img {
        opacity: 1;
        width: 100%;
        max-width: 500px;
    }

    .descevents {
        color: rgb(221, 187, 255);
        text-align: center;
        margin: 20px 0;
    }

    .button {
        text-align: right;
        margin-top: 20px;
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

    .dropdown {
        margin: 20px 0;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: antiquewhite;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        color: brown;
        border-radius: 10px;
        padding: 10px;
    }

    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        text-align: center;
        margin-bottom: 10px;
    }

    .calendar div {
        padding: 10px;
        cursor: pointer;
    }

    .calendar div:hover {
        background-color: darkgoldenrod;
        border-color: antiquewhite;
        border-radius: 10px;
    }

    .calendar .header {
        font-weight: bold;
    }

    .calendar .days {
        grid-column: span 7;
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .nav-buttons {
        grid-column: span 7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .time-picker {
        display: flex;
        justify-content: space-between;
    }

    .time-picker select {
        padding: 5px;
        margin-right: 5px;
        border: none;
        border-radius: 4px;
    }

    #date-time-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: antiquewhite;
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

    .show {
        display: block;
    }

    .counter {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .counter-container {
        display: flex;
        align-items: center;
        border-radius: 5px;
        padding: 10px;
    }

    button {
        background-color: red;
        color: #fff;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 20px;
        border-radius: 5px;
    }

    button:disabled {
        background-color: #cccccc;
        cursor: not-allowed;
    }

    input[type="text"] {
        width: 40px;
        text-align: center;
        border: none;
        border-radius: 10px;
        font-size: 20px;
        margin: 0 10px;
        outline: none;
    }

    #about {
        width: 90%;
        max-width: 1000px;
        border-top: 1px solid grey;
        margin: 40px auto;
        padding-top: 20px;
        text-align: center;
        word-spacing: 5px;
        letter-spacing: 4px;
    }

    .fa {
        padding: 20px;
        font-size: 30px;
        width: 50px;
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
    <a class="active" href="#home">HOME</a>
    <a href="#location">LOCATION</a>
    <a href="#museum">MUSEUM</a>
    <a href="#about">ABOUT</a>
    <a class="b" href="file:///C:/xampp/htdocs/html/LOGINPAGE.html">SIGN UP</a>
</div>

<br><br><br><br>

<div class="line1">
    <h1 class="w3-margin">DESCRIPTION</h1>

    <div class="museum1">
        <div class="gambar">
            <img src="bckground duit.jpg">
        </div>

        <div class="descevents">
            <h2>EVENTS</h2>
            <p>29-30 NOVEMBER 2022</p>
        </div>
    </div>

    <div class="counter">
        <div class="counter-container">
            <button onclick="decrease()">-</button>
            <input type="text" id="counter" value="0">
            <button onclick="increase()">+</button>
        </div>
    </div>

    <div class="button">
        <button class="btnproceed" onclick="confirm()">PROCEED</button>
        <button class="btncancel" onclick="cancel()">CANCEL</button>
    </div>

    <div class="dropdown">
        <button onclick="toggleDropdown()" class="btn">Choose Date & Time</button>
        <div id="dropdownContent" class="dropdown-content">
            <div class="calendar">
                <div class="header">SUN</div>
                <div class="header">MON</div>
                <div class="header">TUE</div>
                <div class="header">WED</div>
                <div class="header">THU</div>
                <div class="header">FRI</div>
                <div class="header">SAT</div>

                <div class="days">
                    <!-- Days will be dynamically populated here -->
                </div>

                <div class="nav-buttons">
                    <button onclick="prevMonth()">&#10094;</button>
                    <span id="currentMonth">June 2022</span>
                    <button onclick="nextMonth()">&#10095;</button>
                </div>
            </div>

            <div class="time-picker">
                <label for="hours">Hours:</label>
                <select id="hours">
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <!-- Add more options as needed -->
                </select>

                <label for="minutes">Minutes:</label>
                <select id="minutes">
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select>

                <label for="amPm">AM/PM:</label>
                <select id="amPm">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
            </div>

            <button id="date-time-button" onclick="selectDateTime()">Select</button>
        </div>
    </div>
</div>

<div id="about">
    <h3>About</h3>
    <p>Some information about the events and museum</p>
</div>

<footer>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-facebook"></a>
</footer>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    function decrease() {
        var value = parseInt(document.getElementById('counter').value, 10);
        value = isNaN(value) ? 0 : value;
        value--;
        document.getElementById('counter').value = value;
    }

    function increase() {
        var value = parseInt(document.getElementById('counter').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('counter').value = value;
    }

    function confirm() {
        alert('Proceed button clicked');
    }

    function cancel() {
        alert('Cancel button clicked');
    }

    function toggleDropdown() {
        document.getElementById("dropdownContent").classList.toggle("show");
    }

    function prevMonth() {
        alert('Previous month');
    }

    function nextMonth() {
        alert('Next month');
    }

    function selectDateTime() {
        var hours = document.getElementById('hours').value;
        var minutes = document.getElementById('minutes').value;
        var amPm = document.getElementById('amPm').value;
        alert('Selected time: ' + hours + ':' + minutes + ' ' + amPm);
    }
</script>

</body>
</html>
