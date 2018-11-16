<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<style type="text/css">
		.title{
			height:23px;
			background-color:#808080;
			text-align: left;
			padding-left: 10px;
			padding-top: 2px;
		}
		.main{
			background-color: #e2e2e2;
			min-height: 50px;
			text-align: left;
			padding-left:10px;
		}
		.btn{
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
  background-color: transparent;
  border-color: red;
}
		input {
  width: 200px;
  padding: 5px;
  border: none;
  border-radius: 4px;
  
  margin-top: 10px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 10px;
  text-decoration: none; 
}
	</style>
</head>
<body style="background-size: cover;opacity: 0.7;background-color: #234043;">
	
</body>
</html>
<?php
session_start();
$username=$_SESSION["username"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from blog1 where username='$username' order by blog_id";
		echo '<div style="margin-top:30px;">';
		if(mysqli_query($con,$q))
		{
			$i=mysqli_query($con,$q);
			if(mysqli_num_rows($i))
			{
				echo '<form action="ob1.php" method="post">';
				while($r=mysqli_fetch_row($i))
				{
					echo '<center><div style="width:60%;">';
		echo '<div class="title" >'.$r[2].'</div>';
		echo '<div class="main">'.$r[3].'<div style="padding-left:80%;color:blue;"><b>-'.$r[1].'</b></div>';
		echo $r[4].'<button type="button" name="'.$r[0].'a" style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="like.png" style="height:100%;width:100%;"></button>';
		echo '<button type="button" name="'.$r[0].'b"style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="comment.png" style="width:100%;height:100%;"></button>';
		echo '<button type="submit" name="'.$r[0].'d" style="background-color:#e6e6e6;outline:none;border:none;width:10%;"><img src="delete.png" style="width:100%;height:100%;"></button>';
		echo '<button type="button" style="background-color:black;color:white;outline:none;border-radius:5px;margin-left:5px;" onclick="b('.$r[0].')">Comments</button>';
		echo '<div id="'.$r[0].'ff" style="background-color:#e6e6e6;display:none;">';
		$q1="select * from comments where blog_id=".$r[0];
		$i1=mysqli_query($con,$q1);
		if(mysqli_num_rows($i1)==0)
		{
			echo 'No comments..';
		}else{
		while($r1=mysqli_fetch_row($i1))
		{
			echo '<div><b style="color:blue;">'.$r1[1].'</b>:<x style="margin-left:20px;">'.$r1[3].'</x></div>';
		}}
		echo '</div>';
		echo '</div></center></form>';

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
		echo '</div>';
?>
<script type="text/javascript">
	function a(x) {
		document.getElementById(x).style.display='block';
	}
	function b(x) {
		x+='ff';
		//alert(x);
		document.getElementById(x).style.display='block';
		
	}
</script>