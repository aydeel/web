<!DOCTYPE html>
<html>
<head>
<meta name = "viewport" content = "width = device-width, initial-scale = 1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<style>

* {
    box-sizing: border-box;
}
h1{
  font-family: Oswald, sans-serif;
  margin: auto;
  color: white;
  font-family: Oswald, sans-serif;
  width: 200px;
  max-width: 100%;
  text-decoration : underline;
}


/*BACKGROUND*/
body { 
    background-image: url('mapygsebenar.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    background-size: 1500px 800px;
    background-size: cover;
    height: 100%;
    font-family: "Noto Sans", sans-serif;
    color: white;
    opacity: 0;
    position: relative;
    animation: mymove 2s;
    animation-fill-mode: forwards;
}
@keyframes mymove {
  from {top: 0px;}
  to {top: 10px; opacity: 1;}
}
.container {
  margin: 70px auto;
  max-width: 100%;
  max-height: 100%;
  width: 500px;
  height: 950px;
  padding: 45px;
  border: 1px solid white;
  backdrop-filter: blur(5px) ;
  border-radius: 10px;
  background-color: rgba(0,0,0, 0.4);
}
img{
  max-width:100%;
  width:3500px;
  display: inline-block;
  margin: auto;
}
input[type=text],input[type=email], input[type=password], input[type=ic], input[type=phone], input[type=username]{
  width: 100%;
  padding: 17px;
  margin: 30px 0 7px 0;
  border-radius: 20px;
  background-color: rgba(0,0,0, 0.4);
  color: white;
}
/*CURSOR TOUCH KOTAK FORM*/
input[type=text]:focus, input[type=email]:focus, input[type=password]:focus, input[type=ic]:focus, input[type=phone]:focus, input[type=username]{
  outline: none;
}
.show{
  margin-left: 10px;

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
.tulisan{
    color : rgb(255, 237, 237);
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    position: absolute;
    top: 8px;
    left: 16px;
}
.tulisansignup{
  color: white;
  margin-left: 140px;
}
span.login{
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








<body>


<div class = "bg-img">

    <h1><b>REGISTER</b></h1>

  <form onsubmit="return fill()" action = "checksignup.php" method = "POST" class = "container">
    <img src="logohub1.png">

    <label for = "email"></label>
    <input type = "email" placeholder = "Enter Email" name = "email" >
    <p class = error id = erroremail>ㅤ</p>

    <label for = "username"></label>
    <input type = "text" placeholder = "Enter Username" name = "username" >
    <p class = error id = errorusername>ㅤ</p>

    <label for = "ic"></label>
    <input type = "text" placeholder = "Enter No. IC" name = "ic" >
    <p class = error id = erroric>ㅤ</p>

    <label for = "phone"></label>
    <input type = "text" placeholder = "Enter Phone No." name = "phone" >
    <p class = error id = errorphone>ㅤ</p>

    <label for = "password"></label>
    <input type = "password" placeholder = "Enter Password" id = "password" name = "pass">
    <p class = error id = errorpass>ㅤ</p>

    <div class = "show">
    <input type = "checkbox" onclick = "myFunction()" >       Show Password
    </div>

    <input type = "submit" class = "btnsubmit" value = "SIGN UP">
    <span class="login">Already have an account? <a href="loginpage.php"> Log In</a></span>

  </form>
</div>

<script>
      function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
          x.type = "text";
      } 
      else {
          x.type = "password";
      }
      }
</script>

<script>
      function fill(){
          
          var email = document.querySelector("input[name = 'email']");
          var username = document.querySelector("input[name = 'username']");
          var ic = document.querySelector("input[name = 'ic']");
          var phone = document.querySelector("input[name = 'phone']");
          var password = document.querySelector("input[name = 'pass']");

          var bool = true;
        
          if(email.value === ""){
            document.getElementById("erroremail").innerHTML = "Please fill your email";
            bool = false;
          }

          if(username.value === ""){
            document.getElementById("errorusername").innerHTML = "Please fill your username";
            bool = false;
          }

          if(ic.value === ""){
            document.getElementById("erroric").innerHTML = "Please fill your IC number";
            bool = false;
          }

          if(phone.value === ""){
            document.getElementById("errorphone").innerHTML = "Please fill your phone number";
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











