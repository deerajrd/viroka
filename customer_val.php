<?php
	ob_start();
	include("inc/session.php");
	include("inc/connection.php");
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$iseg = mysqli_real_escape_string($con,$_POST['iseg']);	
	$route = mysqli_real_escape_string($con,$_POST['route']);
	$ctype = mysqli_real_escape_string($con,$_POST['ctype']);
	$designation = mysqli_real_escape_string($con,$_POST['designation']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobno = mysqli_real_escape_string($con,$_POST['mobno']);
	$add = mysqli_real_escape_string($con,$_POST['add']);

	if(isset($_GET['add_customer'])){
	$query = mysqli_query($con,"INSERT INTO `customertable`(`c_id`, `cname`, `iseg`, `route`, `ctype`, `designation`, `email`, `mobile`, `address`, `date_registered`,`username`) VALUES ('','$cname','$iseg','$route','$ctype','$designation','$email','$mobno','$add',now(),'$username')")or die(mysqli_error($con));
	if ($query){
	?>
	<script>
		alert('added Successfully....');
		window.location.href="manage_customers.php";
	</script>
<?php
	}
	}
	else 
	if(isset($_GET['update_customer'])){
	 $id = $_GET['cust_id'];

	$query = mysqli_query($con,"UPDATE `customertable` SET `cname`='$cname', `iseg`='$iseg', `route`='$route', `ctype`='$ctype', `designation`='$designation', `email`='$email', `mobile`='$mobno', `address`='$add' WHERE `c_id`='$id'")or die(mysqli_error($con));	
	if ($query){
	?>
	<script>
		alert('Updated Successfully....');
		window.location.href="manage_customers.php";
	</script>
<?php
	}
	}

	else if(isset($_GET['delete_customer']))
	{
		$id = $_GET['id'];
		//$id=$_REQUEST['cust_id'];
		$sql = mysqli_query($con, "DELETE FROM `customertable` WHERE c_id='$id'") or die(mysqli_error($con)); 
		//delete query to go here
	}
?>
