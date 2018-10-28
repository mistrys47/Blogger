<?php
if($_POST["password"]==$_POST["password1"])
{
	$hash = md5( rand(0,1000) ); 
	$name=$_POST["name"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	//echo $file = $_FILES['image']['name'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	//echo $image;
	$password=hash('sha512',$password);
	$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$q="Insert into userdetail (name,email,username,password,hash,image) values('$name','$email','$username','$password','$hash','{$image}')";
	//echo $q;
	if(mysqli_query($con,$q))
	{
		session_start();
		$_SESSION["email"]=$email;
		$_SESSION["msg"]=$hash;
		echo '<script>window.location.href="mail/index.php";</script>';
	}
	else
	{
		$q1="create table userdetail(name VARCHAR(30),email VARCHAR(20),username VARCHAR(20),password CHAR(128),hash CHAR(128),image blob,verified INT default 0,ad_verfied INT default 0)";
		$i=mysqli_query($con,$q1);
		mysqli_query($con,$q); 
		session_start();
		$_SESSION["email"]=$email;
		$_SESSION["msg"]=$hash;
	}
}
else
{
	echo '<script>alert("check password");window.location.href="signup.html";</script>';
}
?>