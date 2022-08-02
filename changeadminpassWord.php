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
		
		function chk(){
			var p1=document.getElementById("password").value;
			var p2=document.getElementById("password2").value;
			if(p1==p2)
				{
					return true;
				}
			else{
				alert("Password not matched");
				event.preventDefault();
				return false;
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
  <a href="Admin.php" >Admin</a>
  <a href="#"class="active">Change password</a>
  <a href="log_out.php">Log Out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i>
  </a>
	 
	  
	  
</div>
<div class="mid">
<form action="changeadminpassWord.php" method="post">
	
	
	<table width="851" height="216" border="0" style="margin-top: 50px">
	  <tbody>
	    <tr>
	      <td width="340" height="63"> Password:</td>
	      <td width="501"><input type="password" name="password" id="password"></td>
        </tr>
	    <tr>
	      <td height="66" style="margin-right:200px">RE-Password:</td>
	      <td><input type="password" name="password2" id="password2"></td>
        </tr>
		 <?php 
		  
		  $con=mysqli_connect("localhost","root","","waddb");
			
			if(!$con)
			{
				die("Sorry, We are facing a technical issue");
			}
		  if(isset($_POST["submit"]))
		  {
		  $password=$_POST["password"];	
		  $sql="UPDATE `tbllogin` SET `password`='".$password."' WHERE `username`='Admin';";
		  $results=mysqli_query($con,$sql);
		  echo("<script>alert('Password Updated'); </script>");
		  }
		  
		  mysqli_close($con);
		  ?>
	    <tr>
	      <td height="77"><input type="submit" name="submit" id="submit" value="Submit" style="margin-left: 100px" onClick="chk()"></td>
	      <td><input type="reset" name="reset" id="reset" value="Reset"></td>
        </tr>
      </tbody>
  </table>
</form>
</div>		
</body>
</html>