<?php
	ob_start();
	include("inc/session.php");
	include("inc/connection.php");
	$SupName = mysqli_real_escape_string($con,$_POST['SupName']);
	$SupType = mysqli_real_escape_string($con,$_POST['SupType']);
	$SupDes = mysqli_real_escape_string($con,$_POST['SupDes']);	
	$SupEmail = mysqli_real_escape_string($con,$_POST['SupEmail']);
	$SupMobNo = mysqli_real_escape_string($con,$_POST['SupMobNo']);
	$SupAltNo = mysqli_real_escape_string($con,$_POST['SupAltNo']);
	$SupPhone = mysqli_real_escape_string($con,$_POST['SupPhone']);
	$Supadd = mysqli_real_escape_string($con,$_POST['Supadd']);
	$SupCity = mysqli_real_escape_string($con,$_POST['SupCity']);
	$SupPin = mysqli_real_escape_string($con,$_POST['SupPin']);
	$SupFax = mysqli_real_escape_string($con,$_POST['SupFax']);

	if(isset($_GET['add_supplier'])){

		$sql = mysqli_query($con, "SELECT * FROM `suppliertable` WHERE `Email` = '$SupEmail'") or die(mysqli_error($con));
		$count = mysqli_num_rows($sql);

		if($count > 0)
		{
			header("location:add_supplier.php?Exists");
		}
		else
		{
	$query = mysqli_query($con,"INSERT INTO `suppliertable`(`supplier_id`, `SupplierName`, `SupplierType`, `Designation`, `Email`, `Mobile`, `AltMobile`, `Phone`, `Address`, `City`, `Pin`, `Fax`) VALUES ('','$SupName','$SupType','$SupDes','$SupEmail','$SupMobNo','$SupAltNo','$SupPhone','$Supadd','$SupCity','$SupPin','$SupFax')")or die(mysqli_error($con));
	if ($query){
	?>
	<script>
		alert('Added Successfully....');
		window.location.href="manage_supplier.php";
	</script>
<?php
	}
}
	}
	else 
	if(isset($_GET['update_supplier'])){
	 $id = $_GET['sup_id'];

	$query = mysqli_query($con,"UPDATE `suppliertable` SET `SupplierName`='$SupName',`SupplierType`='$SupType',`Designation`='$SupDes',`Email`='$SupEmail',`Mobile`='$SupMobNo',`AltMobile`='$SupAltNo',`Phone`='$SupPhone',`Address`='$Supadd',`City`='$SupCity',`Pin`='$SupPin',`Fax`='$SupFax' WHERE supplier_id = '$id'")or die(mysqli_error($con));	
	if ($query){
	?>
	<script>
		alert('Updated Successfully....');
		window.location.href="manage_supplier.php";
	</script>
<?php
	}
	}

	else if(isset($_GET['delete_supplier']))
	{
		$id = $_GET['id'];
		//$id=$_REQUEST['cust_id'];
		$sql = mysqli_query($con, "DELETE FROM `suppliertable` WHERE supplier_id = '$id'") or die(mysqli_error($con)); 
		//delete query to go here
	}
?>
