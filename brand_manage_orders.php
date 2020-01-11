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
									<th>Item Name</th>
									<th>Branch</th>
									<th>Customer Name</th>
									<th>PartBilling</th>
									<th>Action</th>
								</tr>
							</thead>
				
							<tbody>
								<?php
									include("inc/connection.php");
									$query = mysqli_query($con,"SELECT * FROM `ordertable` INNER JOIN `team` ON `ordertable`.team_id = `team`.team_id INNER JOIN `customertable` ON `ordertable`.c_id = `customertable`.c_id INNER JOIN `inventory` ON `ordertable`.item_id = `inventory`.item_id INNER JOIN `payment_reason` ON `ordertable`.ORno = `payment_reason`.order_id WHERE `payment_reason`.partbilling = 'Approve' AND `payment_reason`.user_role='3'") or die(mysqli_error($con));

									//WHERE `paymenttable`.status = '0'
									$i = 1;
									while($row = mysqli_fetch_array($query)){
								?>

							<tr class="record">
								<td> <?php echo $i++; ?> </td>
								<td> <?php echo $row['order_num']; ?> </td>
								<td> <?php echo $row['item_name']; ?> </td>
								<td> <?php echo $row['Branch']; ?> </td>
								<td> <?php echo $row['cname']; ?> </td>
								<td> 
									<?php 
										$partbilling = $row['partbilling'];
										switch ($partbilling) {
											case 'Approve':
												echo "<span class='label label-success'>Approved</span>";
												break;

											case 'Dis-Approve':
												echo "<span class='label label-danger'>Rejected</span><a href='#' data-toggle='modal' data-target='#myModal$i' class='label label-info btn-xs pull-right'><i class='fa fa-info-circle'>&nbsp;</i>Know Why?</a>";
												echo '<div id="myModal'.$i.'" class="modal fade" role="dialog">
  														<div class="modal-dialog">
    														<div class="modal-content">
      															<div class="modal-header">
        															<button type="button" class="close" data-dismiss="modal">&times;</button>
        															<h4 class="modal-title">Reason for Dis-Approve</h4>
      															</div>
      															<div class="modal-body">
        															<p>'.$row['partbilling_reason'].'</p>
      															</div>
      															
      															<div class="modal-footer">
        															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      															</div>
    														</div>
														</div>
													</div>';
												break;
											
											default:
												echo "<span class='label label-info'>Pending</span>";
												break;
										}

									 ?> 
								</td>
								
								<td>
									<div class="btn-group">
										<a href="view_order.php?order_id=<?php echo $row[0]; ?>" data-toggle="tooltip" title="View Orders" class="btn btn-primary btn-xs">View Details</a>
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
