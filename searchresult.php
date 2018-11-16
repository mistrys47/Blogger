<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	</style>
</head>
<body>

</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$q="select * from userdetail where username='".$_POST["sresult"]."'";
	$i=mysqli_query($con,$q);
	if(mysqli_num_rows($i)==0)
	{
		$q="select * from blog1 where title='".$_POST["sresult"]."'";
		$i=mysqli_query($con,$q);
		while($r=mysqli_fetch_row($i))
		{
			echo '<center><div style="width:60%;">';
		echo '<div class="title" >'.$r[2].'</div>';
		echo '<div class="main">'.$r[3].'<div style="padding-left:75%;color:blue;"><b>-'.$r[1].'</b></div></div></div>';
		}
	}
	else
	{
		while($row=mysqli_fetch_row($i))
		{	
		/*echo $row[0].$row[1];
		echo "<img src='data:image/png;base64,".base64_encode($row[6])."' width='240' height='270'></img>";*/
		echo '<body background="random.jpg"style="margin-top:100px;background-size:cover; font-size:120%;   "><center><div class="card" style="width:400px">
    <img class="card-img-top" src="data:image/png;base64,'.base64_encode($row[5]).'" alt="Card image" style="height:400px;">
    <div class="card-body" style="">
      <h4 class="card-title">'.$row[0].'</h4>
      <h6>'.$row[1].'</h6>
      <h6>'.$row[2].'</h6>
    </div>
  </div></center></body>';
		}
	}
  ?>