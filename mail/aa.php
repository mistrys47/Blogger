<html>
<style type="text/css">
	input[type=text]{
		
	}
	.form__input {
		height:10px;
   		width: 20%;
  		padding: 20px;
  		border-radius: 17px;
  		font-family: "Roboto";
  		outline-color:white;
  		border: 2px solid #73AD21;
  		margin-top: 10px;
	}
	.divd{
		display: none;
	}
	.slc{
		margin-left: 10px;
		border-radius: 17px;
		border:2px solid #73AD21;
		height: 10px;
		padding: 20px;
		margin-top: 20px;
	}
	.btn{
	border:1px;
	border-style:inset;
	height:45px;
	width:65px;
	border-radius:12px;
	font-size:15px;
	width:100px;
	margin-right:100px;
	margin-top:19px;
	border-color:#2471A3;
	color:black;	
}
</style>

<body>
	<center>
	<form name="abc" method="post" action="index.php" >
		<div><input type="text" name="sub" class="form__input" placeholder="Subject"></div>
		<div><textarea rows="5" cols="60"  name="msg" class="form__input" style="height:120px;" placeholder="Messsage"></textarea>
			</div>
			<div style="margin-top: 10px;"><input type="file" name="image" id="image"  /></div>
		<div><input type="number" id="nu" name="nu" class="form__input" placeholder="No of mail receivers" onchange="abc2()"></div>
		<div id="d" class="divd"></div>
	</form>
</center>
<script >
	function abc2(){
		document.getElementById("d").innerHTML="";
		document.getElementById("d").style.display="block";
		var x=document.getElementById("nu").value;
		for(var i=1;i<=x;i++)
		{
		    var k=document.createElement("INPUT");
		    k.setAttribute("type","email");
		    k.setAttribute("style","width:15%");
		    k.setAttribute("name","add"+i);
		    k.setAttribute("placeholder","Enter email");
		    k.setAttribute("required","true");
		    k.setAttribute("class","form__input");
		    document.getElementById("d").appendChild(k);
		    k=document.createElement("select");
		    k.setAttribute("class","slc");
		    k.setAttribute("name","adds"+i);
		    document.getElementById("d").appendChild(k);
		    x1=document.createElement("option");
		    x1.value="a";
		    x1.appendChild(document.createTextNode("a"));
		    k.appendChild(x1);
		    x1=document.createElement("option");
		    x1.value="cc";
		    x1.appendChild(document.createTextNode("cc"));
		    k.appendChild(x1);
		    x1=document.createElement("option");
		    x1.value="bcc";
		    x1.appendChild(document.createTextNode("bcc"));
		    k.appendChild(x1);
		    k=document.createElement("BR");
		    document.getElementById("d").appendChild(k);
		}
		var k1=document.createElement("INPUT");
		k1.setAttribute("type","submit");
		k1.innerHTML="submit";
		k1.setAttribute("class","btn");
		document.getElementById("d").appendChild(k1);
	}
</script>
</body>

</html>