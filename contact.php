<?php
session_start();
$username=$_SESSION["username"];
if(isset($_POST["sub"]))
{
	$comment=$_POST["sug"];
	$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$q="insert into contact(username,message) values('".$username."','".$comment."')";
	//echo $q;
	mysqli_query($con,$q);
	echo "<script>alert('Thank you...!!!');window.location.href='profile.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.btn{
  width: 20%;
  padding: 10px;
  border-radius: 4px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
  background-color: transparent;
  border-color: green;
  background-color: white;
  margin-left: 37px;
  margin-top: 10px;
  margin-bottom: 10px;
}
		input {
  width: 200px;
  padding: 5px;
  border-color: green;
  border-radius: 4px;
  margin-top: 10px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 10px;
  text-decoration: none; 
}
	</style>
</head>
<body>
<form method="post" action="contact.php"><center>
	<div style="margin-top:20px;"><textarea rows="10" cols="100" name="sug" placeholder="Any suggestions"></textarea></div>
	<input type="submit" name="sub" class="btn">
	<h3 style="margin-top: 20px;">Email:<x style="color: red;margin-left: 2px;">admin@admin.com</x></h3>
</center>
</form>
	
</form>
</body>
</html>