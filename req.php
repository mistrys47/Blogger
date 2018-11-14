<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #234043;">

</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from userdetail where verified=1 and ad_verified=0";
		$i=mysqli_query($con,$q);
		echo '<div style="margin:10px 10px 10px 10px;">';
		while($r=mysqli_fetch_row($i))
		{
			echo '<div style="color:white;">'.$r[2].'</div>';
		}
?>