<?php
/* Uključuje php datoteku u drugoj*/
require_once('connect.php');
/* U ovoj if naredbi isset provjerava da li je varijabla postavljena ili ne, dok empty provjerava da li je varijabla prazna ili ne*/
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$firstname=md5($_POST['firstname']);
	$lastname=md5($_POST['lastname']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$dob=md5($_POST['dob']);
	$address=md5($_POST['address']);
	$password = md5($_POST['password']);
	$avatar = md5($_POST['avatar']);

	$sql = "INSERT INTO `login` (username, firstname, lastname, email, dob, address, password, avatar) VALUES ('$username','$firstname,'$lastname','$email','$dob','$address' '$password', '$avatar')";
	$result = mysqli_query($connection, $sql);
	if($result){
		$smsg = "User registration successfull";
	}else{
		$fmsg = "User registration failed";
	}
}


?>

