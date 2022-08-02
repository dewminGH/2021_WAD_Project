<?php session_start(); 
if (!isset($_SESSION["username"]))
{
	header('Location:../Login_signup.php');

}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="cs_requestsheet.css">
<script type="text/javascript" src="../JS/req.js"></script>	
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
	
	<div class="topnav" id="topnav" >
  <a1 href="#"><img class="logo" src="../IMG/logo.jpg" width="153px" height="59px"></a1>
  <a href="#" class="trash"></a><a href="#" class="trash"></a> <!-- empty layer..-->
  <a href="../Home.html">Back</a>
  <a href="#" class="active">Order</a>
  <a href="../log_out.php">Log out</a>			
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="topbk">
	<div class="topic"><br>ORDER REQUEST SHEET
	<br>
	</div>
</div>
<div class="midbk">	
<form id="form1" name="form1" method="post" action="reqSheet.php" enctype="multipart/form-data">
  <table width="1542" height="627" border="0">
    <tbody>
      <tr>
        <td colspan="2"><h5>Personal Information</h5></td>
      </tr>
      <tr>
        <td width="326">Full name</td>
        <td width="1206"><input type="text" name="txtname" id="txtname" required></td>
      </tr>
      <tr>
        <td>NIC</td>
        <td><input type="text" name="txtnic" id="txtnic" pattern="[0-9]{9}[Vv]"  required></td>
      </tr>
      <tr>
        <td>Contatct Number</td>
        <td><input type="text" name="txtCnumber" id="txtCnumber" required></td>
      </tr>
      <tr>
        <td>Adress</td>
        <td><textarea name="txtaddress" id="txtaddress"></textarea></td>
      </tr>
      <tr>
        <td>EmailEmail</td>
        <td><input type="text" name="txtmail" id="txtmail" required></td>
      </tr>
      <tr>
        <td colspan="2"><h5>Order Information</h5></td>
      </tr>
      <tr>
        <td>Requesting Repair Cost Estimation</td>
        <td><select name="lstEstimate" id="lstEstimate">
			<option value="Yes">Yes</option>
			<option value="NO">No</option>
        </select></td>
      </tr>
      <tr>
        <td>Repair Duration (DAYS)</td>
        <td><input type="number" name="number" id="number" min="7" max="60"></td>
      </tr>
      <tr>
        <td>Discription</td>
        <td><textarea name="discription" id="discription"></textarea></td>
      </tr>
      <tr>
        <td>Images</td>
        <td><input type="file" name="img1" id="img1"></td>
      </tr>
	
		
		<?php
		
		if(isset($_POST["submit"]))
		{
			
			
			$name=$_POST["txtname"];
			$nic=$_POST["txtnic"];
			$number=$_POST["txtCnumber"];
			$address=$_POST["txtaddress"];
			$email=$_POST["txtmail"];
			$estimate=$_POST["lstEstimate"];
			$repairday=$_POST["number"];
			$discription=$_POST["discription"];
			$image = "uploads/".basename($_FILES["img1"]["name"]);
			
			move_uploaded_file($_FILES["img1"]["tmp_name"],$image);
			
			
			$con=mysqli_connect("localhost","root","","waddb");
			
			if(!$con)
			{
				die("Sorry, We are facing a technical issue");
			}
		
			   
			
				$sql="INSERT INTO `tblreqsheet`(`name`, `nic`, `number`, `address`, `email`, `estimate`, `repairday`, `discription`, `imagepath`) VALUES ('".$name."','".$nic."','".$number."','".$address."','".$email."','".$estimate."','".$repairday."','".$discription."','".$image."');";
				
			if(  mysqli_query($con,$sql))
	       {
		           echo "uploaded Successfully";
	         }
	       else{
		     echo "Opps something is wrong, Please select the file again";
			}
			
	   
        mysqli_close($con);		
			
		}
		
		
		?>
		
		
		
		
      <tr>
        <td><input type="submit" name="submit" id="submit" value="Submit" onClick="fuctionRun()">
          <input type="reset" name="reset" id="reset" value="Reset"></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

</form>
</div>
	

<div class="botbk" >
</div>
</body>
</html>
