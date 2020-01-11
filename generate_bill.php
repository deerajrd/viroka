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
.billouter {
    padding: 10px;
    border: 1px solid #CCC5B9;
}
.billheader {
    background-color: #8495a2;
    margin: -10px;
    margin-bottom: 20px;
	padding: 15px;
}
.billheader h1{    
    margin: 0;
	color:#fff;
	margin-top: 12px;
}
.rightheadcol label {
    font-weight: 200;
    margin-bottom: 0;
	color:#fff;
}
@media print {
        #printarea {
            display: block;
        }

        .Dashboard {
            display: none;
        }
#printbtn{display: none;}
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
						
						<?php
							include("inc/connection.php");
							$cust_id = $row['c_id'];
							$query2 = mysqli_query($con,"SELECT * FROM `customertable` WHERE c_id = '$cust_id'") or die(mysqli_error($con));
							$row_cust = mysqli_fetch_array($query2);
						?>
						

						<?php
							include("inc/connection.php");
							$payment_id = $_GET['order_id'];
							$query3 = mysqli_query($con,"SELECT * FROM `paymenttable` WHERE order_id = '$payment_id'") or die(mysqli_error($con));
							$row_payment = mysqli_fetch_array($query3);
						?>

						<div class="container-fluid billouter" id="printarea">
							<div class="billheader">
							<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<h1>Invoice</h1>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 rightheadcol">
								<label>647-444-1234</label><br/>
								<label>Viroka@gmail.com</label>
								<label>Viroka@Yahoo.com</label>
							</div>
							<div class="col-xs-3 col-sm-3 col-md-3 rightheadcol">
								<label style="font-size:18px">Viroka</label><br/>
								<label>Address</label><br/>
								<label>City,State,Country</label>
							</div>
							</div>
							</div>
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4">
								<label>Billed To</label>
								<p><?php echo $row_cust['address']; ?></p>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4" style="padding-left:0;">
								<label>Invoice Number</label>
								<p><?php echo $row['order_num']; ?></p><br/>
								<label>Delivery Date</label>
								<p><?php echo $row['DeliveryCommitted']; ?></p>
							</div>
							<div class="col-xs-4 col-sm-4 col-md-4">
								<label>Invoice Total</label>
								<h1 style="color: #8495a2;margin: 0;"><?php echo $row['price']; ?></h1>
							</div>
						</div><hr/ style="    border-top: 1px solid #8495a2; margin-bottom:0;">
						<div class="row-fluid">
						<table class="table table-striped" style="min-height:250px;">
						<thead>
							<tr>
								<td>Description</td>
								<td>Unit Coast</td>
								<td>Qty</td>
								<td>Amount</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row['item_name']; ?></td>
								<td><?php echo $row['Rate']; ?></td>
								<td><?php echo $row['qty']; ?></td>
								<td><?php echo $row['price']; ?></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3"></td><td><?php echo $row['price']; ?></td>
							</tr>
						</tfoot>
						</table>
						</div>
						
						<div class="row-fluid">
							<h3> Payment Details </h3>
						</div>
							<div class="row-fluid">
							<div class="col-xs-2 col-sm-2 col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Advance:</label>
        						<p class="input form-control border-input"><?php echo $row_payment['Advance']; ?></p>
    						</div>
							</div>
							
							<div class="col-xs-3 col-sm-3 col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Prior to Delivery:</label>
       							<p class="input form-control border-input"><?php echo $row_payment['PriortoDelivery']; ?></p>
    						</div>
							</div>
							
							<div class="col-xs-2 col-sm-2 col-md-2">
							<div class="form-group">
     							<label class="control-label" for="email">Delivery:</label>
        						<p class="input form-control border-input"><?php echo $row_payment['ondelivery']; ?></p>
    						</div>
							</div>
				
							<div class="col-xs-3 col-sm-3 col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Installation:</label>
  								<p class="input form-control border-input"><?php echo $row_payment['oninstallation']; ?></p>
    						</div>
							</div>
							
							<div class="col-xs-2 col-sm-2 col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Credit:</label>
  								<p class="input form-control border-input"><?php 
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
							<div class="clearfix"></div>
							<hr style="    border-top: 1px solid #8495a2;">	
						<div class="text-center">
						<input type='button' class="btn btn-primary" id='printbtn' value='Print'></div>
						</div>

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
<script>
$("#printbtn").click(function () {
	$("#printarea").show();
    window.print();
    //$("#printarea").print();
});
</script>
   
</body>
</html>
