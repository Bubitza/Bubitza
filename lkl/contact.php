<?php
$servername ="localhost";
$username = "root";
$password = "";

$link = mysqli_connect($servername, $username);

if (!$link) {
 die("Connection failed: " . mysqli_connect_error());
 session_start();
 require_once('connect.php');
}


?>

<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="./css/style.css">
<style>
body {
    background-image: url("imgs/bg.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
	width:100%;
	height:100%;
	
}
</style>

</head>
<body background="pozadina.jpg">
<div id="main-wrapper">
	<ul>
	  <li><a class="active" href="home.php">Home</a></li>
	  <li><a href="news.php">News</a></li>
	  
	  <li><a href="contact.php">Comments</a></li>
	  <li style="float:right"><a href="logout.php">Log Out</a></li>
	</ul>
	
	
	<div id="comment">
	<form action="insert.php"">

	
		Username:<br>
		<input type="text" name="username" value=" <?php echo $_SESSION['username'];?>"><br>

		Date:<br>
		<input type="text" name="date" value="<?php echo date("D/m/y"); ?>"><br>
		Comment:<br>
		<textarea name="com" rows="3" cols="50"></textarea><br>
		<button type="submit" >Send</button><br><br><hr>
	
	<?php
		mysqli_select_db($link, "cc");
		$result = mysqli_query($link , "SELECT * FROM coment");
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		 echo  "-".$row["username"]." "." &nbsp;".$row["date"]."<br>".$row["com"]."<hr>";
		}
		mysqli_free_result($result);
	?>
	
		
	
	</form>
	</div>

</div>




	
</div>
</body>
</html>	