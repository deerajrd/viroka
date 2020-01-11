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
                                <i class="fa fa-dashboard"></i> Dashboard / Manage Supplier 
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
									<th>Supplier Name</th>
									<th>Supplier Type</th>
									<th>Designation</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Address</th>
									<th>Action</th>
								</tr>
							</thead>
				
							<tbody>
								<?php
									include("inc/connection.php");
									$query = mysqli_query($con,"SELECT * FROM `suppliertable`");
									$i = 1;
									while($row = mysqli_fetch_array($query)){
								?>

							<tr class="record">
								<td> <?php echo $i++; ?> </td>
								<td> <?php echo $row['SupplierName']; ?> </td>
								<td> <?php echo $row['SupplierType']; ?> </td>
								<td> <?php echo $row['Designation']; ?> </td>
								<td> <?php echo $row['Email']; ?> </td>
								<td> <?php echo $row['Mobile']; ?> </td>
								<td> <?php echo $row['Address']; ?> </td>
								<td>
									<div class="btn-group">
										<a href="view_supplier.php?sup_id=<?php echo $row['supplier_id']; ?>" data-toggle="tooltip" title="View Supplier" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										<a href="add_supplier.php?sup_id=<?php echo $row['supplier_id']; ?>&update_supplier" data-toggle="tooltip" title="Edit Supplier" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
										<a href="#" id="<?php echo $row['supplier_id']; ?>" data-toggle="tooltip" title="Delete Supplier" class="btn btn-danger btn-sm delbutton"><i class="fa fa-trash-o"></i></a>
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
			var info = 'id=' + del_id + '&delete_supplier';
 			if(confirm("Sure you want to delete?"))
		 	{
 				$.ajax({
  					 type: "GET",
   					 url: "supplier_val.php",
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
