<?php
	ob_start();
	include("inc/session.php");
	include("inc/connection.php");
	$item_no = mysqli_real_escape_string($con,$_POST['item_no']);
	$item_name = mysqli_real_escape_string($con,$_POST['item_name']);	
	$supplier_id = mysqli_real_escape_string($con,$_POST['supplier_id']);
	$item_model = mysqli_real_escape_string($con,$_POST['item_model']);
	$item_qty = mysqli_real_escape_string($con,$_POST['item_qty']);
	$rate = mysqli_real_escape_string($con,$_POST['rate']);


	if(isset($_GET['add_inventory'])){
	$query = mysqli_query($con,"INSERT INTO `inventory`(`item_id`, `supplier_id`, `item_no`, `item_name`, `model`, `Qty`, `Rate`) VALUES ('','$supplier_id','$item_no','$item_name','$item_model','$item_qty','$rate')")or die(mysqli_error($con));
	if ($query){
	?>
	<script>
		alert('added Successfully....');
		window.location.href="manage_inventory.php";
	</script>
<?php
	}
	}
	else 
	if(isset($_GET['update_inventory'])){
	 $id = $_GET['item_id'];

	$query = mysqli_query($con,"UPDATE `inventory` SET `supplier_id`='$supplier_id',`item_no`='$item_no',`item_name`='$item_name',`model`='$item_model',`Qty`='$item_qty',`Rate`='$rate' WHERE item_id = '$id'")or die(mysqli_error($con));	
	if ($query){
	?>
	<script>
		alert('Updated Successfully....');
		window.location.href="manage_inventory.php";
	</script>
<?php
	}
	}

	else if(isset($_GET['delete_inventory']))
	{
		$id = $_GET['id'];
		//$id=$_REQUEST['cust_id'];
		$sql = mysqli_query($con, "DELETE FROM `inventory` WHERE item_id='$id'") or die(mysqli_error($con)); 
		//delete query to go here
	}
?>
