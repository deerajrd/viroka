<?php
	include("inc/session.php");
	include("inc/connection.php");

	$user_role = $_SESSION['user_role'];

	

	

	if(isset($_GET['add_order'])){
		
		
	$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	$supplier = mysqli_real_escape_string($con,$_POST['supplier']);
	$qty = mysqli_real_escape_string($con,$_POST['qty']);
	$price = mysqli_real_escape_string($con,$_POST['price']);

	$order_num = "ORNO-".rand(0,1000);

	$query1 = mysqli_query($con, "SELECT MAX(ORno) FROM `ordertable`")or die(mysqli_error($con));
    $results = mysqli_fetch_array($query1);
	$cur_auto_id = $results['MAX(ORno)'] + 1;


	$branch = mysqli_real_escape_string($con,$_POST['branch']);
	$steam = mysqli_real_escape_string($con,$_POST['steam']);	
	$smanager = mysqli_real_escape_string($con,$_POST['smanager']);
	$bspecialist = mysqli_real_escape_string($con,$_POST['bspecialist']);
	
	$customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);
	
	$otype = mysqli_real_escape_string($con,$_POST['otype']);
	$cpono = mysqli_real_escape_string($con,$_POST['cpono']);
	$cpodate = mysqli_real_escape_string($con,$_POST['cpodate']);
	$sub_date = date('Y-m-d');
	$delcom = mysqli_real_escape_string($con,$_POST['delcom']);
	$ovalue = mysqli_real_escape_string($con,$_POST['ovalue']);
	
	$advance_pay = mysqli_real_escape_string($con,$_POST['advance']);
	$priorpay = mysqli_real_escape_string($con,$_POST['priorpay']);
	$ondel = mysqli_real_escape_string($con,$_POST['ondel']);
	$oninstall = mysqli_real_escape_string($con,$_POST['oninstall']);
	$query = mysqli_query($con,"INSERT INTO `ordertable`(`ORno`, `order_num`, `item_id`, `order_id`,`supplier`, `qty`, `price`, `Branch`, `team_id`, `SalesManager`, `BrandSpl`, `OrderType`, `CostPOno`, `CustPOdate`,`ORNSubDate`,`DeliveryCommitted`, `OrderValue`, `c_id`, `username`) 
		VALUES ('',
		'$order_num',
		'$item_id',
		'$cur_auto_id',
		'$supplier',
		'$qty',
		'$price',
		'$branch',
		'$steam',
		'$smanager',
		'$bspecialist',
		'$otype',
		'$cpono',
		'$cpodate',
		'$sub_date',
		'$delcom',
		'$ovalue',
		'$customer_id',
		'$username')")or die(mysqli_error($con));

	$order_id = mysqli_insert_id($con);


	$payment_query = mysqli_query($con, "INSERT INTO `paymenttable`(`c_id`, `Advance`, `PriortoDelivery`, `ondelivery`, `oninstallation`, `Credit`, `partshipment`, `partbilling`,`order_id`) VALUES ('$customer_id','$advance_pay','$priorpay','$ondel','$oninstall','','$partship','$partbilling','$order_id')") or die(mysqli_error($con));

	


	if ($query){
	?>
	<script>
		alert('Added Successfully....');
		window.location.href="manage_orders.php";
	</script>
<?php
	}
	}
	else 
	if(isset($_GET['update_order'])){
	 $id = $_GET['order_id'];
	 
	 
	$item_id = mysqli_real_escape_string($con,$_POST['item_id']);
	$supplier = mysqli_real_escape_string($con,$_POST['supplier']);
	$qty = mysqli_real_escape_string($con,$_POST['qty']);
	$price = mysqli_real_escape_string($con,$_POST['price']);

	$order_num = "ORNO-".rand(0,1000);


	$branch = mysqli_real_escape_string($con,$_POST['branch']);
	$steam = mysqli_real_escape_string($con,$_POST['steam']);	
	$smanager = mysqli_real_escape_string($con,$_POST['smanager']);
	$bspecialist = mysqli_real_escape_string($con,$_POST['bspecialist']);
	
	$customer_id = mysqli_real_escape_string($con,$_POST['customer_id']);
	
	$otype = mysqli_real_escape_string($con,$_POST['otype']);
	$cpono = mysqli_real_escape_string($con,$_POST['cpono']);
	$cpodate = mysqli_real_escape_string($con,$_POST['cpodate']);
	$sub_date = date('Y-m-d');
	$delcom = mysqli_real_escape_string($con,$_POST['delcom']);
	$ovalue = mysqli_real_escape_string($con,$_POST['ovalue']);
	
	$advance_pay = mysqli_real_escape_string($con,$_POST['advance']);
	$priorpay = mysqli_real_escape_string($con,$_POST['priorpay']);
	$ondel = mysqli_real_escape_string($con,$_POST['ondel']);
	$oninstall = mysqli_real_escape_string($con,$_POST['oninstall']);

	$up_query = mysqli_query($con,"UPDATE `ordertable` SET `item_id` = '$item_id', `supplier` = '$supplier', `price` = '$price', `qty`= '$qty', `Branch`='$branch',`team_id`='$steam',`SalesManager`='$smanager',`BrandSpl`='$bspecialist',`OrderType`='$otype',`CostPOno`='$cpono',`CustPOdate`='$cpodate',`ORNSubDate`='$sub_date',`DeliveryCommitted`='$delcom',`OrderValue`='$ovalue',`c_id`='$customer_id',`username`='$username' WHERE ORNO = '$id'")or die(mysqli_error($con));	

	$up_query = mysqli_query($con,"UPDATE `paymenttable` SET `Advance`='$advance_pay',`PriortoDelivery`='$priorpay',`ondelivery`='$ondel',`oninstallation`='$oninstall',`partshipment`='$partship',`partbilling`='$partbilling' WHERE order_id = '$id'")or die(mysqli_error($con));


	if ($up_query){
	?>
	<script>
		alert('Updated Successfully....');
		window.location.href="manage_orders.php";
	</script>
<?php
	}
	}

	else if(isset($_GET['delete_order']))
	{
		$id = $_GET['id'];
		//$id=$_REQUEST['cust_id'];
		$sql = mysqli_query($con, "DELETE FROM `ordertable` WHERE ORno='$id'") or die(mysqli_error($con)); 
		$sql = mysqli_query($con, "DELETE FROM `paymenttable` WHERE order_id='$id'") or die(mysqli_error($con));
		$sql = mysqli_query($con, "DELETE FROM `payment_reason` WHERE order_id='$id'") or die(mysqli_error($con)); 
		//delete query to go here
	}









	/***/
	if(isset($_POST['post_delivery_term']))
	{
		$order_id = $_GET['order_id'];
		$partship = mysqli_real_escape_string($con,$_POST['partship']);
		$partbilling = mysqli_real_escape_string($con,$_POST['partbilling']);

		$partbill_reason = mysqli_real_escape_string($con,$_POST['partbill_reason']);

		$user_role = $_SESSION['user_role'];

		if($partbilling == 'Approve')
		{
			$status = "1";
		}
		else
		{
			$status = "0";
		}

		$check_payment = mysqli_query($con, "SELECT * FROM `payment_reason` WHERE order_id = '$order_id' AND user_role = '$user_role'") or die(mysqli_error($con));
		$count_payment = mysqli_num_rows($check_payment);

		if($count_payment > 0)
		{
			$payment_query = mysqli_query($con, "UPDATE `payment_reason` SET partshipment = '$partship', partbilling='$partbilling', partbilling_reason = '$partbill_reason', `user_role` = '$user_role', `status` = '$status' WHERE order_id = '$order_id'") or die(mysqli_error($con));
		}
		else
		{
			$payment_query = mysqli_query($con, "INSERT INTO `payment_reason`(`reason_id`, `order_id`, `partshipment`, `partbilling`, `partbilling_reason`, `username`,`user_role`,`status`) VALUES ('','$order_id','$partship','$partbilling','$partbill_reason','$username','$user_role', `status` = '$status')") or die(mysqli_error($con));
		}

		

		if($payment_query)
		{
	?>
		<script>
			alert('Updated Successfully....');
			window.location.href="sm_manage_orders.php";
		</script>
	<?php
		}
	}





?>
