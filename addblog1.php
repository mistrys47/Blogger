<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		session_start();
	$username=$_SESSION["username"];
	$message=$_POST["message"];
	$title=$_POST["title"];
	$q="insert into blog1(username,title,message) values ('$username','$title','$message')";
	if(mysqli_query($con,$q))
	{
		echo "<script>alert('blog added');window.location.href='ob.php';</script>";
	}
	else
	{
		$q1="CREATE TABLE `blog1` (`blog_id` int(11) NOT NULL AUTO_INCREMENT,`username` varchar(30) NOT NULL,`title` varchar(50) NOT NULL,`message` text NOT NULL,PRIMARY KEY (`blog_id`))";
		mysqli_query($con,$q1);
		mysqli_query($con,$q);
		echo "<script>alert('blog added');window.location.href='ob.php';</script>";
	}
?>