<?php
session_start();
$username=$_SESSION["username"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from blog1 where username='$username' order by blog_id";
		$i=mysqli_query($con,$q);
		while($r=mysqli_fetch_row($i))
		{
			$x=$r[0];
			$x.='d';
			echo  $x;
			if(isset($_POST[$x]))
			{
				echo $x;
				$q1="delete from blog1 where blog_id=".$r[0];
				mysqli_query($con,$q1);
				echo "<script>window.location.href='ob.php';</script>";
			}
		}
		?>