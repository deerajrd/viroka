<?php
	include("inc/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<?php include("inc/head.php"); ?>

<style>
.form-horizontal .form-group {
    margin: 10px 0;
}
p.input {
    font-weight: 500;
    padding: 10px 10px;
}
h3 {
    border-bottom: 1px solid #ddd;
    border-top: 1px solid #ddd;
    padding: 10px 0px;
    font-size: 18px;
}
</style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
		<?php include("inc/mainmenu.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid Dashboard">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Welcome, <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / View Order 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
				
				<?php
					include("inc/connection.php");
					$order_id = $_GET['order_id'];
					$query = mysqli_query($con,"SELECT * FROM `ordertable` INNER JOIN `team` ON `ordertable`.team_id = `team`.team_id INNER JOIN `customertable` ON `ordertable`.c_id = `customertable`.c_id INNER JOIN `inventory` ON `inventory`.item_id = `ordertable`.item_id WHERE ORno = '$order_id'") or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
				?>


			  <div class="container-fluid formarea">
					<div class="container1">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
      								<label class="control-label" for="email">Order Number:</label>
									<p class="input form-control border-input"><?php echo $row['order_num']; ?></p>
							</div>
							</div>
						</div>
					</div>
								
						<div class="container1">
						<h3>Item Details</h3>
						<div class="row">
							<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label" for="email">Item Name:</label>
								<p class="input form-control border-input"><?php echo $row['item_name']; ?></p>
							</div>
							</div>

							<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label" for="email">Supplier:</label>
								<p class="input form-control border-input"><?php echo $row['supplier']; ?></p>
							</div>
							</div>

							<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label" for="email">Qty:</label>
								<p class="input form-control border-input"><?php echo $row['qty']; ?></p>
							</div>
							</div>

							<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label" for="email">Price:</label>
								<p class="input form-control border-input"><?php echo $row['price']; ?></p>
							</div>
							</div>
						</div>
					</div>
				</div>

            <div class="container-fluid formarea">				
						<div class="container1">
						<h3>Sales Team Details</h3>
						<div class="row">
							<div class="col-md-3">
    						<div class="form-group">
      							<label class="control-label" for="email">Branch:</label>
								<p class="input form-control border-input"><?php echo $row['Branch']; ?></p>
							</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Team:</label>
								<p class="input form-control border-input"><?php echo $row['team_name']; ?></p>									
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Executive:</label>
        						<p class="input form-control border-input"><?php echo $username; ?></p>
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Manager:</label>
								<p class="input form-control border-input"><?php echo $row['SalesManager']; ?></p>
    						</div>
							</div>
						</div>
						<div class="row">
							
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Brand Specialist:</label>
								<p class="input form-control border-input"><?php echo $row['BrandSpl']; ?></p>        						
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Order Type:</label>
								<p class="input form-control border-input"><?php echo $row['OrderType']; ?></p> 									
    						</div>
							</div>
						</div>
						
						<h3>Purchase Order Details</h3>
						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO No:</label>
								<p class="input form-control border-input"><?php echo $row['CostPOno']; ?></p> 
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO Date:</label>
								<p class="input form-control border-input"><?php echo $row['CustPOdate']; ?></p> 
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Delivery Committed:</label>
								<p class="input form-control border-input"><?php echo $row['DeliveryCommitted']; ?></p> 
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Order Value:</label>
        						<p class="input form-control border-input"><?php echo $row['OrderValue']; ?></p> 
    						</div>
						</div>
						</div>
						
						
						<?php
							include("inc/connection.php");
							$cust_id = $row['c_id'];
							$query2 = mysqli_query($con,"SELECT * FROM `customertable` WHERE c_id = '$cust_id'") or die(mysqli_error($con));
							$row_cust = mysqli_fetch_array($query2);
						?>
						
						<h3>Customer Details</h3>
						<div class="row">
						<div class="col-md-3">
						<div class="form-group">
      							<label class="control-label" for="email">Name:</label>
       							<p class="input form-control border-input"><?php echo $row_cust['cname']; ?></p> 
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Industry Segment:</label>
								<p class="input form-control border-input"><?php echo $row_cust['iseg']; ?></p> 							
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Route:</label>
									<p class="input form-control border-input"><?php echo $row_cust['route']; ?></p>
    						</div>
						</div>
	
						<div class="col-md-3">	
							<div class="form-group">
     							<label class="control-label" for="email">Customer Type:</label>
									<p class="input form-control border-input"><?php echo $row_cust['ctype']; ?></p>
    						</div>
						</div>
						</div>
							
						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Designation:</label>
        						<p class="input form-control border-input"><?php echo $row_cust['designation']; ?></p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Email:</label>
       							<p class="input form-control border-input"><?php echo $row_cust['email']; ?></p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
     							<label class="control-label" for="email">Mobile:</label>
        						<p class="input form-control border-input"><?php echo $row_cust['mobile']; ?></p>
    						</div>
						</div>
						
						<div class="col-md-3">
    						<div class="form-group">
      							<label class="control-label" for="email">Address:</label>
  								<p class="input form-control border-input"><?php echo $row_cust['address']; ?></p>
    						</div>
						</div>
						</div>
							
						<?php
							include("inc/connection.php");
							$payment_id = $_GET['order_id'];
							$query3 = mysqli_query($con,"SELECT * FROM `paymenttable` WHERE order_id = '$payment_id'") or die(mysqli_error($con));
							$row_payment = mysqli_fetch_array($query3);
						?>
							<h3> Payment Terms </h3>	
							<div class="row">
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Advance:</label>
        						<p class="input form-control border-input"><?php echo $row_payment['Advance']; ?></p>
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Prior to Delivery:</label>
       							<p class="input form-control border-input"><?php echo $row_payment['PriortoDelivery']; ?></p>
    						</div>
							</div>
							
							<div class="col-md-2">
							<div class="form-group">
     							<label class="control-label" for="email">On Delivery:</label>
        						<p class="input form-control border-input"><?php echo $row_payment['ondelivery']; ?></p>
    						</div>
							</div>
				
							<div class="col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Installation:</label>
  								<p class="input form-control border-input"><?php echo $row_payment['oninstallation']; ?></p>
    						</div>
							</div>
					
						
							<div class="col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Credit:</label>
  								<p class="input form-control border-input">
								<?php 
								$ad = $row_payment['Advance'];
								$pd = $row_payment['PriortoDelivery'];
								$od = $row_payment['ondelivery'];
								$oi = $row_payment['oninstallation'];
								echo $row['OrderValue'] - ($ad + $pd + $od + $oi);
								?>
								</p>
    						</div>
							</div>
						</div>
							
						<?php 
							if(($_SESSION['user_role'] == '3') || ($_SESSION['user_role'] == '4') || ($_SESSION['user_role'] == '5') || ($_SESSION['user_role'] == '6'))
							{
								include("inc/connection.php");
								$sql = mysqli_query($con, "SELECT * FROM `payment_reason` WHERE user_role = '$user_role' AND order_id = '$order_id'") or die(mysqli_error($con));
								$row_reason = mysqli_fetch_array($sql);
								$count = mysqli_num_rows($sql);
								if($count > 0)
								{
									/*$payment_query = mysqli_query($con, "INSERT INTO `payment_reason`(`reason_id`, `order_id`, `username`, `user_role`, `status`) VALUES ('','$order_id','$username','$user_role','1')") or die(mysqli_error($con));*/
									?>

									<?php
								echo "<p style='color:red;'>Partshipping:" .$row_reason['partshipment']."</p><br/>";
								echo "<p>&nbsp;</p>";
								echo "<p style='color:red;'>Partbilling:" .$row_reason['partbilling']."<br/>".$row_reason['partbilling_reason']."</p>";



								}
								else
								{
									
						?>
						<form name="" method="post" action="order_val.php?order_id=<?php echo $order_id; ?>">
							<h3>Delivery Terms</h3>
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Shipment:</label>
								<select name="partship" id="partship-select" class="form-control border-input" />
									<option> Approve</option>                 
                  				</select>									
    						</div>
							</div>
							
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Billing:</label>
								<select name="partbilling" id="partbilling-select" class="form-control border-input">
				  					<option> <?php echo $row_reason['partbilling'] = "" ? "Select Part Billing Permission" :  $row_reason['partbilling']; ?></option>
                   					<!--<option disabled><?php //echo $billing; ?></option>-->
                    				<option>Approve</option>
                    				<option>Dis-Approve</option>                   
                  				</select> 
    						</div>
							</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="form-group" id="partbill_reason" style="display:none;">
										<label>Reason of rejection:</label>
										<textarea rows="5" class="form-control border-input" name="partbill_reason" placeholder="Mention reason for Disapproving item."></textarea>
									</div>
								</div>
							</div>


						
														
							<div class="row">
							<div class="col-md-12 centered" style="text-align:center;">
    						<div class="form-group">        
        							<button type="submit" name="post_delivery_term" class="btn btn-primary btn-block1 btn-info" style="width: 200px;">Submit</button>
    						</div>
							</div>
							</div>
						</form>

						<?php
							}
							}	
						?>

						</div> <!--- container--->
  						
            </div>					
            <!-- /.row -->
			  


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
        <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>




 	<script>
		$('#partbilling-select').on('change',function(){
     		var selection = $(this).val();
     		alert(selection);
   			 switch(selection){
    			case "Dis-Approve":
    				$("#partbill_reason").show()
   					break;
    			default:
    				$("#partbill_reason").hide()
    			}
		});
	</script>
   
</body>
</html>
