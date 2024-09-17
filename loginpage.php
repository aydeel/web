<html>
  
<head>
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<style>

    * {
      box-sizing: border-box;
    }
    h1{
      color: WHITE;
      margin : auto;
      display : block;
      width: 100px;
      max-width: 100%;
      text-decoration : underline;
    }
    body { 
      background-image: url('mapygsebenar.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center; 
        background-size: 1500px 800px;
        background-size: cover;
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        opacity: 0;
        position: relative;
        animation: mymove 2s;
        animation-fill-mode: forwards;
    }
    .container {
      margin: 70px auto;
      max-width: 100%;
      max-height: 100%;
      width: 500px;
      height: 650px;
      padding: 45px;
      border: 1px solid white;
      backdrop-filter: blur(5px) ;
      border-radius: 10px;
      background-color: rgba(0,0,0, 0.4);
    }
    @keyframes mymove {
      from {top: 0px;}
      to {top: 10px; opacity: 1;}
    }
    img{
      max-width:100%;
      width:3500px;
      display: inline-block;
      margin: auto;
    }
    input[type=text],input[type=username], input[type=password] {
      width: 100%;
      padding: 17px;
      margin: 30px 0 20px 0;
      border-radius: 20px;
      background-color: rgba(0,0,0, 0.4);
      color: white;
    }
    /*CURSOR TOUCH KOTAK FORM*/
    input[type=text]:focus, input[type=username]:focus, input[type=password]:focus {
      outline: none;
    }
    .btnsubmit {
      margin-top: 20px;
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

    .tulisanmuseum{
      color : white;
      font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      position: absolute;
      top: 8px;
      left: 16px;
    }
    .tulisanlogin{
      color: white;
      margin-left: 150px;
    }
    span.signup{
      color: white;
      float: right;
      padding-top: 16px;
    }
    span a{
      color: #ffb74a;
    }
    .error{
      margin : 0px;
      font-size: 14px;
      float:right;
    }




</style>


</head>

<!----------------------------------------------------------------------------------------------------------------------------------------------------->
<body>



<div class = "bg-img">

    <h1><b>LOGIN</b></h1>

    <form action = "checklogin.php" method = "POST" class = "container" >
    <img src="logohub1.png">

    <label for = "username"></label>
    <input type = "text" placeholder = "Enter Username" name = "nama" >
    <p class = error id = errorname>ㅤ</p>

    <label for = "password"></label>
    <input type = "password" placeholder = "Enter Password" name = "pass">
    <p class = error id = errorpass>ㅤ</p>

    <input type="radio" name="jenis" value="USER" checked>
    <label for="User" class="w3-text-white">USER</label>

    <input type="radio" name="jenis" value="ADMIN">
    <label for="admin" class="w3-text-white">ADMIN</label><br>
    

    <br><br>

    
    <div class = "show">
    <input type = "checkbox" onclick = "myFunction()" >       Show Password
    </div>


    <input type = "submit" class = "btnsubmit" value = "LOGIN">
    <span class="signup">Don't have an account? <a href="signuppage.php"> Sign Up</a></span>


 
  </form>

</div>


<script>
function myFunction() {
  var x = document.getElementsByName("pass")[0];
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
      function fill(){
          
          var username = document.querySelector("input[name = 'username']");
          var password = document.querySelector("input[name = 'pass']");

          var bool = true;
        

          if(username.value === ""){
            document.getElementById("errorusername").innerHTML = "Please fill your username";
            bool = false;
          }

          if(password.value === ""){
            document.getElementById("errorpass").innerHTML = "Please fill your password";
            bool = false;
          }

          return bool;
  
      }

</script>

</body>
</html>
