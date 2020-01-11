<?php
	include("inc/session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("inc/head.php"); ?>
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
                                <i class="fa fa-dashboard"></i> Dashboard / Manage Orders 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
			
			<div class="container-fluid formarea">					
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped" id="supplier_table">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Order Number</th>
									<th>Product</th>
									<th>Sales Manager</th>
									<th>Brand Specialist</th>
									<th>Customer </th>
									<th>Type</th>
									<th>Ordered Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
				
							<tbody>
								<?php
									include("inc/connection.php");
									$tezt = $_SESSION['username'];
									$query = mysqli_query($con,"SELECT DISTINCT * FROM `ordertable` INNER JOIN `team` ON `ordertable`.team_id = `team`.team_id INNER JOIN `customertable` ON `ordertable`.c_id = `customertable`.c_id INNER JOIN `inventory` ON `inventory`.item_id = `ordertable`.item_id INNER JOIN `payment_reason` ON `payment_reason`.order_id = `ordertable`.ORno WHERE `ordertable`.username = '".$_SESSION['username']."' ");
									//$query = mysqli_query($con,"SELECT DISTINCT * FROM `ordertable` INNER JOIN `team` ON `ordertable`.team_id = `team`.team_id INNER JOIN `customertable` ON `ordertable`.c_id = `customertable`.c_id INNER JOIN `inventory` ON `inventory`.item_id = `ordertable`.item_id INNER JOIN `payment_reason` ON `payment_reason`.order_id = `ordertable`.ORno");

									//$query = mysqli_query($con,"SELECT DISTINCT * FROM `ordertable`");
									$i = 1;
									while($row = mysqli_fetch_array($query)){
										//if(($row['user_role'] == 6) && ($row['partbilling'] == 'Approve'))
										if($row['partbilling'] == 'Approve')
										{
											$status = "Approved";
										}
										else if($row['partbilling'] == 'Dis-Approve')
										{
											$status = "Rejected";
										}
										else
										{
											$status = "Waiting for Approval";
										}
								?>

							<tr class="record">
								<td> <?php echo $i++; ?> </td>
								<td> <?php echo $row['order_num']; ?> </td>
								<td> <?php echo $row['item_name']; ?> </td>

								
								<td> <?php echo $row['SalesManager']; ?> </td>
								<td> <?php echo $row['BrandSpl']; ?> </td>
								<td> <?php echo $row['cname']; ?> </td>
								<td> <?php echo $row['OrderType']; ?> </td>
								<td> <?php echo $row['ORNSubDate']; ?> </td>
								<td> <?php echo $status; ?> </td>
								<td>
									<div class="btn-group">
										<a href="view_order.php?order_id=<?php echo $row[0]; ?>" data-toggle="tooltip" title="View Orders" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										<a href="add_order.php?order_id=<?php echo $row[0]; ?>&update_order" data-toggle="tooltip" title="Edit Order" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
										<a href="#" id="<?php echo $row[0]; ?>" data-toggle="tooltip" title="Delete Order" class="btn btn-danger btn-sm delbutton"><i class="fa fa-trash-o"></i></a>
									</div>
								</td>
							</tr>
							<?php } ?>
							</tbody>	
						</table>
					<!-- /.row -->
					</div>
            	<!-- /.container-fluid -->
        		</div>
			</div>
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

    <script type="text/JavaScript">
		$(document).ready(function(){
        	$('#supplier_table').DataTable();
		});
	</script>


	<script type="text/javascript">
	$(function() {
		$(".delbutton").click(function(){
			//Save the link in a variable called element
			var element = $(this);
			//Find the id of the link that was clicked
			var del_id = element.attr("id");
			//Built a url to send
			var info = 'id=' + del_id + '&delete_order';
 			if(confirm("Sure you want to delete?"))
		 	{
 				$.ajax({
  					 type: "GET",
   					 url: "order_val.php",
   					 data: info,
   					 success: function(){ 
   			}
		 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");
 			}
			return false;
		});
	});
</script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    

</body>

</html>
