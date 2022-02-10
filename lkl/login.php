<?php
session_start();
require_once('connect.php');
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['username'] = $username;
		header("location: recenzije_logged_in.php");
	}else{
		$fmsg = "Invalid Username/Password";
	}
}


?>
