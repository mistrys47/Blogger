<?php
if(!isset($_SESSION["username"]))
{
  echo "<script>window.location.href='login.html';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
  width: 20%;
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
  width: 80%;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
.btn {
   
    width: 50%;
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
}
button:hover{
  color:#0E6251;
  }
	</style>
</head>
<body>
  <div class="row">
	<div  class="column1 left1"style="background-color: #BFC9CA;"><center style="font-size: 50px;">Blogger</center></div>
  <div class="column1 right1" style="background-color: #BFC9CA;padding: 20px;"><button style="padding:10px;border:none;background-color: transparent;font-size: 20px;" onclick="window.location.href='logout.php'">Logout</button></div>
<div class="row">
  <div class="column left" style="background-color:#aaa;">
  	
  	<center>
    <div><button class='btn' style='margin-top: 20px;' onclick='a("profile.php")'>Your Profile</button></div>
  	<div><button class='btn' onclick='a("addblog.php")'>Add Blog</button></div>
  	<div><button class='btn' onclick='a("ob.php")'>View</button></div>
  </center>
 
  </div>
  <div class="column right" style="background-color:white;">
  	<iframe id="main" style="width:100%;height:690px;border-radius: 10px;"src="profile.php"></iframe>
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