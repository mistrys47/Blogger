<html>
<body background="home_back.jpg" style="background-size: cover;opacity: 0.7;">
	
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
$q="select * from blog1";
$i=mysqli_query($con,$q);
while($r=mysqli_fetch_row($i))
{
	$x=$r[0];
	$x.='a';
	if(isset($_POST[$x]))
	{
		$q1='select likes from blog1 where blog_id="'.$r[0].'"';
		$i1=mysqli_query($con,$q1);
		$r1=mysqli_fetch_row($i1);
		$x1=$r1[0]+1;
		$q1='update blog1 set likes='.$x1.' where blog_id="'.$r[0].'"';
		mysqli_query($con,$q1);
		echo "<script>window.location.href='home.php';</script>";
	}
	
}
$i=mysqli_query($con,$q);
while($r=mysqli_fetch_row($i))
{
	$x=$r[0];
	$x.='c';
	if(isset($_POST[$x]))
	{
		$user=$_POST["username".$r[0]];
		//echo $user;
		$email=$_POST["email".$r[0]];
		$comment=$_POST["comment".$r[0]];
		$blogid=$r[0];
		$q1="insert into comments values ($blogid,'$user','$email','$comment')";
		//echo $q1;
		mysqli_query($con,$q1);
		echo "<script>window.location.href='home.php';</script>";
	}
}
?>