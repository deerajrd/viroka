<?php
	/*define('dbhost',"localhost");
	define('dbuser',"root");
	define('dbpass',"");
	define('db',"virokadb");

	$con = mysqli_connect(dbhost,dbuser,dbpass);
	mysqli_select_db($con,db);*/
?>

<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "virokadb";

// Create connection
$con = mysqli_connect($dbhost, $dbuser, $dbpass);
mysqli_select_db($con,$db);

?>