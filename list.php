<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style type="text/css">
		.x{
			margin-left: 10px;
			font-size: 130%;
		}
	</style>
</head>
<body style="background-color: #234043;">

</body>
</html>
<?php
$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
		$q="select * from userdetail where ad_verified=1";
		$i=mysqli_query($con,$q);
		echo '<form method="post" action="reject.php"><div style="margin-left:50px;margin-top:50px;"><table>';
		while($r=mysqli_fetch_row($i))
		{
			echo '<xy style="margin-top:100px;margin-left:100px;background-color:#E5E7E9;float:left;border:none;outline:none;margin-bottom:30px;"><div class="card" style="width:400px;background-color:#B2BABB  ;">
    <img class="card-img-top" src="data:image/png;base64,'.base64_encode($r[5]).'" alt="Card image" style="height:400px;">
    <div class="card-body" style="background-color:#B2BABB  ;border:none;">
      <h4 class="card-title" style="">'.$r[0].'</h4>
      <h6>'.$r[1].'</h6>
      <h6>'.$r[2].'</h6>
      <button type="submit" name="'.$r[2].'d" style="width:12%;border:none;background-color:#9e9e9e00;outline:none;margin-left:30px;"><img src="delete.png" style="width:100%;height:100%;"></button>
    </div>
  </div></xy>';
		}
		echo '</table></div></form>';

?>