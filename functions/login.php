<?php
function login_user(){
	global $con;

$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
//$password = md5(mysqli_real_escape_string($con,$_POST['password']));

$query = mysqli_query($con, "SELECT username,password,utype FROM `users` WHERE username = '$username' AND password = '$password'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);

if($row){
	session_start();
	$_SESSION['username'] = $row['username'];
	$_SESSION['user_role'] = $row['utype'];
	header("location:home.php?success");
	exit(0);
}
else{
	echo "<h4 style='color:red; text-align:center;'>Invalid Username and Password...</h4>";
}
mysqli_close($con);
}
?>