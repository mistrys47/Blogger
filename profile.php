<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>

</style>
</head>
<?php
session_start();
$username=$_SESSION["username"];
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from userdetail where username='$username'";
		$i=mysqli_query($con,$q);
		$row=mysqli_fetch_row($i);
		/*echo $row[0].$row[1];
		echo "<img src='data:image/png;base64,".base64_encode($row[6])."' width='240' height='270'></img>";*/
		echo '<body style="margin-top:100px;background-color:#E5E7E9     "><center><div class="card" style="width:400px">
    <img class="card-img-top" src="data:image/png;base64,'.base64_encode($row[5]).'" alt="Card image" style="height:400px;">
    <div class="card-body" style="">
      <h4 class="card-title">'.$row[0].'</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
    </div>
  </div></center></body>';
?>