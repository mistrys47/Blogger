<?php
$username=$_POST["username"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$password=hash('sha512',$password);
	$q="select count(*) from userdetail where username='$username' AND password='$password'";
	$i=mysqli_query($con,$q);
	if($i)
	{
		$q="select * from userdetail where username='$username' AND password='$password'";
		$i=mysqli_query($con,$q);
		$row=mysqli_fetch_row($i);
    	if($row[6]==1)
    	{
    		session_start();
    		$_SESSION["username"]=$username;
    		echo "<script>alert('success');window.location.href='blogger.php';</script>";
    	}
    	else
    	{
    		echo "<script>alert('Varify account from email account $row[1]');window.location.href='login.html';</script>";
    	}
	}
	else
	{
		echo '<script>alert("Invalid username or password");</script>';
	}
?>