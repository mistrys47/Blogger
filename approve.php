
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from userdetail";
		$i=mysqli_query($con,$q);
		while($r=mysqli_fetch_row($i))
		{
			$x=$r[2];
			$x.='a';
			if(isset($_POST[$x]))
			{
				//echo $x;
				$q1="update userdetail set ad_verified=1 where username='$r[2]'";
				mysqli_query($con,$q1);
				//echo $q1;
				echo "<script>window.location.href='req.php';</script>";
			}
			$x=$r[2];
			$x.='d';
			if(isset($_POST[$x]))
			{
				$q1="update userdetail set ad_verified=2 where username='$r[2]'";
				mysqli_query($con,$q1);
				echo "<script>window.location.href='req.php';</script>";
			}
		}

		?>