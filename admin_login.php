<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
.container {
  position: relative;
  background-color: #79554842;
  padding: 20px 0 30px 0;
  border-radius: 15px;
  opacity: 1;
} 
.container:hover{
  opacity: 1;
}
input {
  width: 290px;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin-left: 50px;
  margin-top: 10px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
}
.btn{
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
  background-color: transparent;
  border-color: red;
}
input:hover,
.btn:hover {
  opacity: 1;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.col {
  float: left;
  width: 50%;
  margin: auto;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }}
  a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
input:hover{
  background-color: white;
}
</style>
</head>
<body background="job10.jpg" style="background-size: cover;">
  <xy style="text-align: right;margin-left: 1300px;"><input type="button" name="" value="Blogger" style="width: 100px;background-color: #397bbe96;"onclick="location.href='login.html';"></xy>
<center>
  <div style="margin-top: 100px;"><h1>Admin Login</h1></div>
<div  class="container" style="width: 25%;" >
  <form method="post" action="admin_login.php">
    <div class="row">
      <div class="col">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" name="sub">
      </div>
      
    </div>
  </form>
  <div style="margin-top: 18px;">Good Vibes Only</div>
</div>
</center>
</body>
</html>
<?php
if(isset($_POST["sub"])){
$username=$_POST["username"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
  if(!mysqli_select_db($con,"blog"))
    mysqli_query($con,"CREATE DATABASE blog");
    mysqli_select_db($con,"blog");
    $q="select * from admin";
    $i=mysqli_query($con,$q);
    $r=mysqli_fetch_row($i);
    if($r[0]==$username && $r[1]==$password)
    {
      session_start();
      $_SESSION["username"]=$username;
      echo '<script>window.location.href="admin_home.php";</script>';
    }
  }
?>