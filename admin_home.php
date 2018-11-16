<?php
session_start();
//echo isset($_SESSION["username"]);
if(!isset($_SESSION["username"]))
{
  echo "<script>alert('pls enter your login credentials');window.location.href='admin_login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<style type="text/css">
	* {
    box-sizing: border-box;
}
.column {
    float: left;
    padding: 10px;
    height: 700px; 
}
.column1{
  float: left;
  padding: 10px;
  height: 80px;
}

.left {
  width: 17%;
  margin-top: 9px;
  border-radius: 10px;
}
.left1{
  width: 92%;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}
.right1{
  width: 7%;
  border-bottom-right-radius: 10px;
  border-top-right-radius: 10px;
}

.right {
  width: 83%;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
.btn {
   
    width: 70%;
    padding: 20px;
	border-width:2px;  
    border-style:outset;
    color: white;
    background-color: #0E6251  ;
    opacity: 0.5;
    border-radius: 12px;
    margin-top: 13px;
    outline: none;
}
.row .left .btn:hover {
    opacity: 1;
    color: white;
}
button:hover{
	color: #0E6251;
}
</style>
</head>
<body style="background-color: #BFC9CA;">
  <div class="row">
	<div  class="column1 left1"style="background-color: #BFC9CA;"><center style="font-size: 50px;margin-left: 350px;">Admin</center></div>
  <div class="column1 right1" style="background-color: #BFC9CA;padding: 20px;">
    <button style="padding:10px;border:none;background-color: transparent;font-size: 20px;outline: none;" onclick="window.location.href='logout.php'">Logout</button></div>
<div class="row">
  <div class="column left" style="background-color:#aaa;">
  	
  	<center>
    <div><button class='btn' style='margin-top: 20px;' onclick='a("home1.php")'>Blogs</button></div>
  	<div><button class='btn' onclick='a("req.php")'>Requests</button></div>
  	<div><button class='btn' onclick='a("list.php")'>List of Bloggers</button></div>
    <div><button class="btn" onclick='a("review.php")'>Reviews</button></div>
  </center>
 
  </div>
  <div class="column right" style="background-color:#BFC9CA;">
  	<iframe id="main" style="width:100%;height:690px;border-radius: 10px;"src="home1.php"></iframe>
  </div>
</div>
</body>
<script type="text/javascript">
	function a(x1) {
		var x=document.getElementById("main");
		x.src=x1;
	}
</script>
</html>
