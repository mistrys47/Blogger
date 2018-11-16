<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		session_start();
	$username=$_SESSION["username"];
	$message=$_POST["message"];
	$title=$_POST["title"];
	echo $message;
	$q="insert into blog1(username,title,message) values ('$username','$title','$message')";
	//echo $q;
	//echo $q;
	$i=mysqli_query($con,$q);
	
		echo "<script>alert('blog added');window.location.href='ob.php';</script>";
?>