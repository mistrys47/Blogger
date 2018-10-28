<?php
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
$email = $_GET['email']; 
    $hash = $_GET['hash']; 
    $con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="Update userdetail set verified=1 where email='$email' AND hash='$hash'";
		$i=mysqli_query($con,$q);
		if($i)
		{
			echo "<script>alert('verified');window.location.href='login.html';</script>";
		}
    }
?>