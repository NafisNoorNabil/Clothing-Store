<?php
require_once('DBconnect.php');
if(isset($_POST['email']) && isset($_POST['pass'])){
	$u=$_POST['email'];
	$p=$_POST['pass'];
	$sql="Select * From userlogin WHERE email= '$u' AND pass='$p'";
	
	$result=mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)!=0){
		$_SESSION['email'] = $u;


		header("Location:home.php");
	}
	else{
		echo "Email or Password is wrong";
		header("Location:home.php");
	}
}
?>
	