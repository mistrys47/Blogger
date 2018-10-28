<?php
session_start();
$username=$_SESSION["username"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from blog1 where username='$username' order by blog_id";
		
		if(mysqli_query($con,$q))
		{
			$i=mysqli_query($con,$q);
			if(mysqli_num_rows($i))
			{
				while($res=mysqli_fetch_row($i))
				{
					//display of blogs code
					echo $res[0];
				}
			}
			else
			{
				echo "<script>alert('Add some blog to your profile');window.location.href='addblog.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('');window.location.href='addblog.php';</script>";
		}
?>