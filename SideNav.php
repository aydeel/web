  <html>
  <body>
  

  <style>


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


        </style>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="mainpage.php">Home</a>
    <a href="profileuser.php">User</a>
    <a href="listmuseumpage.php">Museum</a>
    <a href="#about">About</a>
    <a href="logout.php" class="w3-text-red">Log Out</a>
</div>

<div id="main">
    <span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span>
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
