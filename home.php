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
			color:maroon;
		}
		.main{
			background-color: #e6e6e6;
			min-height: 50px;
			text-align: left;
			padding-left:45px;
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
<body background="home_back.jpg" style="background-size: cover;opacity: 0.7;">
	
</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$q="select * from blog1 order by blog_id desc";
	$i=mysqli_query($con,$q);
	echo '<form method="post" action="like_comment.php">';
	while($r=mysqli_fetch_row($i))
	{
		echo '<center><div style="width:40%;">';
		echo '<div class="title" >'.$r[2].'</div>';
		echo '<div class="main">'.$r[3].'<div style="padding-left:85%;">-'.$r[1].'</div>';
		echo $r[4].'<button type="submit" name="'.$r[0].'a" style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="like.png" style="width:100%;height:100%;"></button>';
		echo '<button type="button" onclick="a('.$r[0].')" name="'.$r[0].'b"style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="comment.png" style="width:100%;height:100%;"></button>';
		echo '<div id="'.$r[0].'" style="display:none;margin-top:10px;"><div>Email-id  :<input type="email" name="email'.$r[0].'"></div>
																		<div>Username  :<input type="text" name="username'.$r[0].'"></div>
																		<div>Comment   :<input type="text" name="comment'.$r[0].'"></div>
																		<div><button type="submit" name="'.$r[0].'c" class="btn">Submit</button>
		</div>';
		echo '</div></center>';
	}
	echo '</form>'
?>
<script type="text/javascript">
	function a(x) {
		document.getElementById(x).style.display='block';
	}
	function b(x) {
		
	}
</script>
