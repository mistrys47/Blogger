<?php
session_start();
//echo isset($_SESSION["username"]);
if(!isset($_SESSION["username"]))
{
  echo "<script>window.location.href='login.html';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style type="text/css">
	* {
    box-sizing: border-box;
}
.column {
    float: left;
    padding: 10px;
    height: 700px; 
}
.column1{
  float: left;
  padding: 10px;
  height: 80px;
}

.left {
  width: 17%;
  margin-top: 9px;
  border-radius: 10px;
}
.left1{
  width: 92%;
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}
.right1{
  width: 7%;
  border-bottom-right-radius: 10px;
  border-top-right-radius: 10px;
}

.right {
  width: 65%;
}
.right4{
  width:18%;
  border-radius: 12px;
  margin-top: 10px;
}
.row:after {
    content: "";
    display: table;
    clear: both;
}
.btn {
   
    width: 50%;
    padding: 20px;
	border-width:2px;  
    border-style:outset;
    color: white;
    background-color: #0E6251  ;
    opacity: 0.5;
    border-radius: 12px;
    margin-top: 13px;
    outline: none;
}
.row .left .btn:hover {
    opacity: 1;
    color: white;
}
button:hover{
	color: #0E6251;
}
</style>
</head>
<body style="background-color: #BFC9CA;">
  <div class="row">
	<div  class="column1 left1"style="background-color: #BFC9CA;"><center style="font-size: 50px;margin-left: 150px;">Blogger</center></div>
  <div class="column1 right1" style="background-color: #BFC9CA;padding: 20px;">
    <button style="padding:10px;border:none;background-color: transparent;font-size: 20px;outline: none;" onclick="window.location.href='logout.php'">Logout</button></div>
<div class="row">
  <div class="column left" style="background-color:#aaa;">
  	
  	<center>
    <div><button class='btn' style='margin-top: 20px;' onclick='a("profile.php")'>Your Profile</button></div>
  	<div><button class='btn' onclick='a("addblog.php")'>Add Blog</button></div>
  	<div><button class='btn' onclick='a("ob.php")'>View</button></div>
    <div><button class="btn" onclick='a("contact.php")'>Contact Us</button></div>
  </center>
 
  </div>
  <div class="column right" style="background-color:#BFC9CA;">
  	<iframe id="main" style="width:100%;height:690px;border-radius: 10px;"src="profile.php"></iframe>
  </div>
  <div class="column right4" style="background-color: #404145;color: white;">

    <?php
    //notification's code
          $con=mysqli_connect("localhost","root","") or die("can't connect");
  if(!mysqli_select_db($con,"blog"))
    mysqli_query($con,"CREATE DATABASE blog");
    mysqli_select_db($con,"blog");
    $q="select * from blog1 where username='".$_SESSION['username']."' and likes<>likes2";
    //echo $q;
    $i=mysqli_query($con,$q);
    while($r=mysqli_fetch_row($i))
    {
      $cnt=$r[4];
      $cnt1=$r[5];
      $cnt=$cnt-$cnt1;
      echo '<div style="margin-top:5px;font-size:120%;"><b style="color:#ff3232;">'.$cnt.' </b> more person liked your blog titled as <b style="color:#ff3232;">'.$r[2].'.</b></div>';
      $q1="update blog1 set likes2=".$r[4]." where blog_id=".$r[0];
      mysqli_query($con,$q1);
    }
    
    $q="select * from blog1 where username='".$_SESSION['username']."'";
    $i=mysqli_query($con,$q);
    while($r=mysqli_fetch_row($i))
    {
      $q1="select * from comments where blog_id=".$r[0]." and seen=0";
      $i1=mysqli_query($con,$q1);
      while($r1=mysqli_fetch_row($i1))
      {
        echo '<div style="margin-top:5px;font-size:120%;"><b style="color:#00d4a5;">'.$r1[1].' </b>commented on your blog titled as <b style="color:#00d4a5;">'.$r[2].'.</b></div>';
        $q2="update comments set seen=1 where blog_id=".$r[0]." and username='".$r1[1]."' and email='".$r1[2]."' and comment='".$r1[3]."'";
        //echo $q2;
        mysqli_query($con,$q2);
      }
    }
    ?>
  </div>
</div>
</body>
<script type="text/javascript">
	function a(x1) {
		var x=document.getElementById("main");
		x.src=x1;
	}
</script>
</html>
