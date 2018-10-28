<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		session_start();
	$username=$_SESSION["username"];
	$q="select ad_verified from userdetail where username='$username'";
	$i=mysqli_query($con,$q);
	if($i){
	$row=mysqli_fetch_row($i);
	if($row[0]==1)
	{
		?><!DOCTYPE html>
		<html>
		<head>
			<style type="text/css">
				.btn {
   
    width: 32%;
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
.form__input {
 height:10px;
  width: 30%;
  padding: 20px;
  border-radius: 17px;
  font-family: "Roboto";
  outline-color:white;
 background-color: white;
 color: black;
 outline: none;
 margin-top: 10px;
}
.btn:hover{
	opacity: 1;
}
			</style>
		</head>
		<body><form method="post" action="addblog1.php"><center>
			<div style="margin-top: 20px;"><h1>Add Blog</h1></div>
			<div ><input type="text" name="title" class="form__input" placeholder="Title"></div>
			<div><textarea name="message"  placeholder="Enter Description here...!!!"  rows="10" style="width: 30%;padding: 20px;border-radius: 17px; font-family: 'Roboto'; outline-color:white; background-color: white;color: black;outline: none;margin-top: 10px;"></textarea></div>
			<div><input type="submit" name="submit" class="btn btn1"  ></div>
		</center></form>
		</body>
		</html><?php
	}
	else
	{
		echo "<script>alert('Wait untill admin verify your account!!!');window.location.href='profile.php';</script>";
	}}
	else
	{
		echo "";
	}
?>