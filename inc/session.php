<?php
session_start();
	$username= $_SESSION['username'];
	if(!(isset($username))){
		header("location:index.php?logged_out");
	}
?>