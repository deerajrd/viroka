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
                                <i class="fa fa-dashboard"></i> Dashboard / Manage Customers 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
			
			<div class="container-fluid formarea">	
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped" id="customer_table">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Name</th>
									<th>Type</th>
									<th>Designation</th>
									<th>Address</th>
									<th>Registered</th>
									<th>Action</th>
								</tr>
							</thead>
				
							<tbody>
								<?php
									include("inc/connection.php");
									if($username == "admin")
									{
										$user = "WHERE 1";
									}
									else
									{
										$user = "WHERE `username` = '$username'";
									}
									$query = mysqli_query($con,"SELECT * FROM `customertable` $user");
									$i = 1;
									while($row = mysqli_fetch_array($query)){
								?>

							<tr class="record">
								<td> <?php echo $i++; ?> </td>
								<td> <?php echo $row['cname']; ?> </td>
								<td> <?php echo $row['ctype']; ?> </td>
								<td> <?php echo $row['designation']; ?> </td>
								<td> <?php echo $row['address']; ?> </td>
								<td> <?php echo $row['date_registered']; ?> </td>
								<td>
									<div class="btn-group">
										<a href="view_customer.php?cust_id=<?php echo $row['c_id']; ?>" data-toggle="tooltip" title="View Customer" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										<a href="add_customers.php?cust_id=<?php echo $row['c_id']; ?>&update_customer" data-toggle="tooltip" title="Edit Customer" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
										<a href="#" id="<?php echo $row['c_id']; ?>" data-toggle="tooltip" title="Delete Customer" class="btn btn-danger btn-sm delbutton"><i class="fa fa-trash-o"></i></a>
									</div>
								</td>
							</tr>
							<?php } ?>
							</tbody>	
						</table>
					
					</div>
				<!-- /.row -->
				</div>
            <!-- /.container-fluid -->
        	</div>
        <!-- /#page-wrapper -->
    	</div>
    <!-- /#wrapper -->
	</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

    <script type="text/JavaScript">
		$(document).ready(function(){
        	$('#customer_table').DataTable();
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
			var info = 'id=' + del_id + '&delete_customer';
 			if(confirm("Sure you want to delete?"))
		 	{
 				$.ajax({
  					 type: "GET",
   					 url: "customer_val.php",
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
