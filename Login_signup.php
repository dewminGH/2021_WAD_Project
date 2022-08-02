<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
	<script type="text/javascript" src="JS/login.js"></script>
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

<body onLoad="toggle_login()">
<div class="topbkc">
<br><br><br>
<h1 ><b> POWER &nbsp;X &nbsp; LANKA &nbsp;(pvt) Ltd (motor rewinding)</b></h1>	
<br><br><br><hr style="border-width: 0px">
</div>	
<div class="topnav" id="topnav">
  <a1 href="#"><img class="logo" src="IMG/logo.jpg" width="153px" height="59px"></a1>
  <a href="#" class="trash"></a><a href="#" class="trash"></a> <!-- empty layer..-->
  <a href="Home.html">Home</a>
  <a href="Req_sheet/reqSheet.php">Order</a>
  <a href="gallery.html">Gallery</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<div class="midbk">
<br><br>	
<button style="margin-left: 300px" onClick="toggle_login()">LOGIN</button>	<button onClick="toggle_signup()">SIGN UP</button>
<form id="form" name="form" method="post" action="Login_signup.php">
	
<p>&nbsp;</p>
<table width="769" height="157" border="0" style="margin-left: 300px">
  <tbody>
    <tr>
      <td width="256"> User Name</td>
      <td width="497"><input type="text" name="txtuser" id="txtuser"></td>
    </tr>
    <tr>
      <td> Password</td>
      <td><p>
        <input type="password" name="password" id="password">
      </p></td>
    </tr>
  </tbody>
</table>
<table width="768" height="303" border="0" style="margin-left: 300px">
  <tbody>
    <tr>
      <td width="255">Confrim Password</td>
      <td width="497"><input type="password" name="password2" id="password2"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="txtname" id="txtname"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="txtaddress" id="txtaddress"></td>
    </tr>
    <tr>
      <td>NIC</td>
      <td><input type="text" name="txtnic" id="txtnic" pattern="[0-9]{9}[Vv]"></td>
    </tr>
	  
	  <?php 
	 
	if (isset($_POST["submit"]))
	{
		
		$username=$_POST["txtuser"];
		$password=$_POST["password"];
		$name=$_POST["txtname"];
		$address=$_POST["txtaddress"];
		$nic=$_POST["txtnic"];
		
		$con=mysqli_connect("localhost","root","","waddb");
		
		if(!$con)
				{	
						die("Sorry, We are facing a technical issue");		
				}
		if($nic==""){
		
		$sql="SELECT `password` FROM `tbllogin` WHERE `username`= '".$username."';";
		
		
		$results=mysqli_query($con,$sql);
		 
	   if(mysqli_num_rows($results)>0)
				{
		   if($_SESSION["username"]=="Admin")
		   {
			        $_SESSION["username"] = $username;
					header('Location:Admin.php');
			   
		   }else{
					$_SESSION["username"] = $username;
					header('Location:Req_sheet/reqSheet.php');}
				}
				else
				{ 
					echo "Please enter a correct user name and a
					password";
				}
		}
		else{
			
			$sql="INSERT INTO `tbllogin`(`username`, `password`, `name`, `address`, `nic`) VALUES ('".$username."','".$password."','".$name."','".$address."','".$nic."');";
			
			$results=mysqli_query($con,$sql);
			
			$rows=mysqli_affected_rows($con);
			if($rows==-1 )
			{
				
				
				echo("<script type='text/javascript'> alert('Username or NIC is already Registered');       </script>  ");
			}
			else
			{
				
				
				echo("<script type='text/javascript'> alert('Successfully Registered .Now Login to ADD Orders');   </script> ");
			}
				
			
		}
	
		
		
		
	mysqli_close($con);		
		
	}
	
	
	
	?>	
	  
	  
	  
	  
    <tr>
      <td height="67"><input type="submit" name="submit" id="submit" value="Sign In" style="margin-left: 0px" ></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</div>
</body>
</html>
