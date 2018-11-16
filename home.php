<?php
	$tags='';
	$con=mysqli_connect("localhost","root","") or die("can't connect");
	if(!mysqli_select_db($con,"blog"))
		mysqli_query($con,"CREATE DATABASE blog");
		mysqli_select_db($con,"blog");
	$q="select * from userdetail";
	$i=mysqli_query($con,$q);
	while($r=mysqli_fetch_row($i))
	{
		$use=$r[2];
		$tags.="$use,";
	}
	$q="select * from blog1";
	$i=mysqli_query($con,$q);
	while($r=mysqli_fetch_row($i))
	{
		$use=$r[2];
		$tags.="$use,";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
		autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
		.btn{
  width: 20%;
  padding: 10px;
  border-radius: 4px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; 
  background-color: transparent;
  border-color: green;
  background-color: white;
  margin-left: 37px;
  margin-top: 10px;
  margin-bottom: 10px;
}
		input {
  width: 200px;
  padding: 5px;
  border-color: green;
  border-radius: 4px;
  margin-top: 10px;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 10px;
  text-decoration: none; 
}
.column {
    float: left;
    padding: 10px;
    height: 700px; 
}
.left{
	width: 75%;
}
.right{
	width: 22%;
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
	echo '<div class="row"><div style="" class="column left"><form method="post" action="like_comment.php">';
	while($r=mysqli_fetch_row($i))
	{
		echo '<center><div style="width:60%;">';
		echo '<div class="title" >'.$r[2].'</div>';
		echo '<div class="main">'.$r[3].'<div style="padding-left:75%;color:blue;"><b>-'.$r[1].'</b></div>';
		echo $r[4].'<button type="submit" name="'.$r[0].'a" style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="like.png" style="width:100%;height:100%;"></button>';
		echo '<button type="button" onclick="a('.$r[0].')" name="'.$r[0].'b"style="width:10%;border:none;background-color:#e6e6e6;outline:none;"><img src="comment.png" style="width:100%;height:100%;"></button>';
		echo '<button type="button" style="background-color:black;color:white;outline:none;border-radius:5px;margin-left:5px;" onclick="b('.$r[0].')">Comments</button>';
		echo '<div id="'.$r[0].'" style="display:none;margin-top:10px;"><div><input type="email" name="email'.$r[0].'" placeholder="Email id"></div>';
																		echo '<div><input type="text" name="username'.$r[0].'" placeholder="Username"></div>
																		<div><input type="text" name="comment'.$r[0].'" placeholder="Comment"></div>
																		<div><button type="submit" name="'.$r[0].'c" class="btn">Submit</button></div>
		</div>';
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
		echo '</center>';
	}
	echo '</form></div>';
	echo '<div style="float:left;" class="column right"><form autocomplete="off" action="searchresult.php" target="target1" method="POST">
 <input id="myInput" type="text" name="sresult" style="" placeholder="Search.."><button class="w3-large b1" type="submit">Search</button>
</form></div></div>';
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
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries ="<?php echo $tags;?>".split(',');

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
