<?php 

require_once('connect.php');

session_start();
$counter_name = "counter.txt";

if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}

$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);


if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}
?>
<html>
<head> 
<meta charset="UTF-8">
<!-- Naslov stranice -->
<title> Recenzije stranica </title>
<style>
	#btn{
		position: fixed;
		bottom: 25;
		right: 25;
		font-weight: bold;	
	}	
</style>
</head>
<body style="background-color:black" background="dank.gif">
<br />

<!-- Glavni naslov na stranici -->
<h1 style="text-align:center"> Dobrodošli na stranicu sa recenzijama drugih web stranica!  
	<?php echo $_SESSION['username'].", ";  echo "Vi ste $counterVal . posjetitlej ove stranice"; ?></h1>

	

<br />
<br />
<hr />

<!-- tablica sa linkovima stranica -->
<table width=100%, height=50%> 
 <tr> <th> <h2> Sve i svasta </h2> </th> <th> <h2> Znanstvene </h2> </th> <th> <h2>  Poucno </h2> </th> <th> <h2> Zabavne </h2> </th> </tr>
 <tr> <td align="center"> <a href="redditr.html"> <h3> Reddit </h3> </a> <a href="4chan.html"> <h3> 4chan </h3> </a> </td> <td align="center"> <a href="nasa.html"> <h3> Nasa </h3> </a> <a href="livescience.html"> <h3> Live Science </h3> </a> </td>  <td align="center"> <a href="w3schools.html"> <h3> W3Schools </h3> </a> </td> <td align="center"> <a href="9gag.html"> <h3>  9gag </h3> </a> <a href="youtube.html"> <h3> YouTube </h3> </a> </td> </tr>

</table>
<a id="btn" href="recenzije.php">Logout</a>
</body>
</html> 

