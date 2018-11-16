<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #234043;color: white;">

</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from contact order by id desc";
		$i=mysqli_query($con,$q);
		echo '<div style="margin-top:30px;margin-left:40px;">';
		$cnt=1;
		while($r=mysqli_fetch_row($i))
		{
			echo '<div style="margin-top:10px;font-size:125%;">'.$cnt.')'.'<xy2 style="margin-top:10px;margin-left:10px;">'.$r[0].'<xy style="margin-left:10px;">: '.$r[1].'</xy></xy2></div>';
			$cnt=$cnt+1;
		}
		echo '</div></center>';
		?>