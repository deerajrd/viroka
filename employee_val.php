<?php
	ob_start();
	include("inc/session.php");
	include("inc/connection.php");
	$ename = mysqli_real_escape_string($con,$_POST['ename']);
	$empdes = mysqli_real_escape_string($con,$_POST['edesig']);	
	$empgrp = mysqli_real_escape_string($con,$_POST['teamgrp']);
	$etype = mysqli_real_escape_string($con,$_POST['emptype']);
	$email = mysqli_real_escape_string($con,$_POST['empmail']);
	$emob = mysqli_real_escape_string($con,$_POST['empmob']);
	$eadd = mysqli_real_escape_string($con,$_POST['empadd']);
	$eusername = mysqli_real_escape_string($con,$_POST['eusername']);
	$epassword = mysqli_real_escape_string($con,$_POST['epassword']);
	//$epassword = md5(mysqli_real_escape_string($con,$_POST['epassword']));
	


	if(isset($_GET['add_employee'])){
	$query = mysqli_query($con,"INSERT INTO `employeetable`(`empid`, `empname`, `designation`, `teamgroup`, `emptype`, `email`, `mobile`, `address`, `eusername`, `epassword`) VALUES ('','$ename','$empdes','$empgrp','$etype','$email','$emob','$eadd','$eusername','$epassword')")or die(mysqli_error($con));

	$login_query = mysqli_query($con, "INSERT INTO `users`(`username`, `fullname`, `contact_no`, `email`, `utype`, `team_grp`,`password`) VALUES ('$eusername','$ename','$emob','$email','$empdes','$empgrp','$epassword')") or die(mysqli_error($con));
	if ($query){
	?>
	<script>
		alert('added Successfully....');
		window.location.href="manage_employee.php";
	</script>
<?php
	}
	}
	else 
	if(isset($_GET['update_employee'])){
	 $id = $_GET['empid'];

	$query = mysqli_query($con,"UPDATE `employeetable` SET `empname`='$ename',`designation`='$empdes',`teamgroup`='$empgrp',`emptype`='$etype',`email`='$email',`mobile`='$emob',`address`='$eadd' WHERE empid = '$id'")or die(mysqli_error($con));	

	$sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE empid = '$id'") or die(mysqli_error($con));
	$ff = mysqli_fetch_array($sql);

	$emp_username = $ff['eusername'];

	$login_query = mysqli_query($con, "UPDATE `users` SET `fullname`='$ename',`contact_no`='$emob',`email`='$email',`utype`='$empgrp' WHERE username = '$emp_username'") or die(mysqli_error($con));	


	if ($query){
	?>
	<script>
		alert('Updated Successfully....');
		window.location.href="manage_employee.php";
	</script>
<?php
	}
	}

	else if(isset($_GET['delete_employee']))
	{
		$id = $_GET['id'];
		//$id=$_REQUEST['cust_id'];
		$sql = mysqli_query($con, "DELETE FROM `employeetable` WHERE empid='$id'") or die(mysqli_error($con)); 
		$del_sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE empid = '$id'") or die(mysqli_error($con));
		$ff = mysqli_fetch_array($sql);

		$emp_username = $ff['eusername'];

		$sql = mysqli_query($con, "DELETE FROM `users` WHERE username='$emp_username'") or die(mysqli_error($con)); 




		//delete query to go here
	}
?>
