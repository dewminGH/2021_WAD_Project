<?php session_start(); 
if (!isset($_SESSION["username"]))
{
	header('Location:Login_signup.php');

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/admin.css">
	<script type="text/javascript" language="javascript" >
	
		//top nav bar 
        function myFunction() {
        var x = document.getElementById("topnav");
        if (x.className === "topnav") {
        x.className += " responsive";
        } else {
        x.className = "topnav";
               }
        }

	</script>
</head>

<body>
	
	<div class="topbkc">
<br><br><br>
<h1 ><b> POWER &nbsp;X &nbsp; LANKA &nbsp;(pvt) Ltd (motor rewinding)<br> ADMIN PAGE</b></h1>	
<br><br><br><hr style="border-width: 0px">
</div>
	
	
  <div class="topnav" id="topnav">
  <a1 href="#"><img class="logo" src="IMG/logo.jpg" width="153px" height="59px"></a1>
  <a href="#" class="trash"></a><a href="#" class="trash"></a> <!-- empty layer..-->
  <a href="Home.html">Home</a>
  <a href="#" class="active">Admin</a>
  <a href="changeadminpassWord.php">Change password</a>
  <a href="log_out.php">Log Out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
	 
	  
	  
</div>
	<form action="Admin.php" method="post">
	<div class="mid">
	<p>
	
	<?php 
		
		$con=mysqli_connect("localhost","root","","waddb");
			
			if(!$con)
			{
				die("Sorry, We are facing a technical issue");
			}
		
		$sql="SELECT * FROM `tblreqsheet`;";
		$results=mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($results)){
			echo("<p1>NAME    :</p1> ".$row["name"]);
			echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p1>NIC     :</p1>".$row["nic"]);
			echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p1>Number  :</p1>".$row["number"]."<br>");
			echo("<p1>Address :</p1>".$row["address"]);
			echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p1>E-mail  :</p1>".$row["email"]);
			echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p1>Estimate:</p1>".$row["estimate"]."<br>");
			echo("<p1>Repair days:</p1>".$row["repairday"]);
			echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p1>Img Path :</p1>".$row["imagepath"]."<br> ");
			echo("<p1>Discription :</p1> :".$row["discription"]."<br> <br><br>");
		}
		
		mysqli_close($con);
		?>	
		
	</p>
	</div> 
	</form>	
	
	
	
</body>
</html>
