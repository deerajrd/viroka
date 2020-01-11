<?php
	error_reporting(0);
	include("inc/session.php");

	include("inc/connection.php");
	$order_id = mysqli_real_escape_string($con,$_POST['o_id']);
	$mname = mysqli_real_escape_string($con,$_POST['mname']);
	
	echo $value = $_POST['value'];
	
	$date = date("Y-m-d");
	$i = 0;

	while($i < $value){
	$item = $_POST['item'.$i];
	$quantity = $_POST['qty'.$i];
	$price = $_POST['price'.$i];
	
	
	
	
	$sql = mysqli_query($con,"SELECT * FROM `add_product` WHERE product_id = '$item'") or die(mysqli_error($con));
	$row = mysqli_fetch_array($sql);
	$product_name = $row['name'];
	
	$qty = $row['qty'];
	if($qty < $quantity)
	{
		header("location:item.php?no_quantity");
	}
	else
	{
	
	$query = mysqli_query($con, "INSERT INTO `order_item`(`id`, `order_id`, `order_date`, `rep_id`, `mname`,`pr_id`,`item`, `qty`,`price`,`status`) VALUES ('','$order_id','$date','$username','$mname','$item','$product_name','$quantity','$price','Order Placed')") or die(mysqli_error($con));
	$query = mysqli_query($con, "UPDATE `add_product` SET qty = qty - '$quantity' WHERE product_id = '$item'") or die(mysqli_error($con));

	$i++;
	}
	}
	//echo "success";
	

	


?>
<script>
		alert('Your Order is Successfull....');
		window.location.href="item.php";
	</script>