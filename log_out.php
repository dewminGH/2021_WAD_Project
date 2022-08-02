<?php session_start(); 
if (!isset($_SESSION["username"]))
{
	header('Location:Login_signup.php');

}
else{
	session_destroy();
	header('Location:Home.html');
}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

	
	
	
<body>
</body>
</html>