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
                                <i class="fa fa-dashboard"></i> Dashboard / Manage Employees 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
			
			<div class="container-fluid formarea">
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped" id="employee_table">
							<thead>
								<tr>
									<th>Sno</th>
									<th>Employee Name:</th>
									<th>Designation:</th>
									<th>Team Group:</th>
									<th>Mobile:</th>
									<th>Address:</th>
									<th>Action</th>
								</tr>
							</thead>
				
							<tbody>
								<?php
									include("inc/connection.php");
									//$id = $_GET['empid'];
									$id = isset($_GET['empid']) ? $_GET['empid'] : '';
									//$query = mysqli_query($con,"SELECT * FROM `inventory` INNER JOIN `suppliertable` ON `inventory`.supplier_id = `suppliertable`.supplier_id");
									$query = mysqli_query($con,"SELECT * FROM `employeetable` INNER JOIN `users` ON `employeetable`.email = `users`.email");
									$i = 1;
									while($row = mysqli_fetch_array($query)){
								?>

							<tr class="record">
								<td> <?php echo $i++; ?> </td>
								<!--<td> <?php //echo $row['empid']; ?> </td>-->
								<td> <?php echo $row['empname']; ?> </td>
								<td> <?php echo $row['designation']; ?> </td>
								<td> <?php echo $row['teamgroup']; ?> </td>						
								<td> <?php echo $row['mobile']; ?> </td>
								<td> <?php echo $row['address']; ?> </td>
								<td>
									<div class="btn-group">
									<a href="view_employee.php?empid=<?php echo $row['empid']; ?>" data-toggle="tooltip" title="View Employee" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										<a href="add_employee.php?empid=<?php echo $row['empid']; ?>&update_employee" data-toggle="tooltip" title="Edit Employee" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
										<a href="#" id="<?php echo $row['empid']; ?>" data-toggle="tooltip" title="Delete Employee" class="btn btn-danger btn-sm delbutton"><i class="fa fa-trash-o"></i></a>
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
        	$('#employee_table').DataTable();
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
			var info = 'id=' + del_id + '&delete_employee';
 			if(confirm("Sure you want to delete?"))
		 	{
 				$.ajax({
  					 type: "GET",
   					 url: "employee_val.php",
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
