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
                                <i class="fa fa-dashboard"></i> Dashboard / Customers Details
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>

                <?php
					include("inc/connection.php");
					$cust_id = $_GET['cust_id'];
					$query = mysqli_query($con,"SELECT * FROM `customertable` WHERE c_id = '$cust_id'") or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
				?>
				
			<div class="container-fluid formarea">	
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Customer Name</th>
									<td> <?php echo $row['cname']; ?> </td>
								</tr>

								<tr>
									<th>Customer Type</th>
									<td> <?php echo $row['ctype']; ?> </td>
								</tr>

								<tr>
									<th>Designation</th>
									<td> <?php echo $row['designation']; ?> </td>
								</tr>

								<tr>
									<th>Address</th>
									<td> <?php echo $row['address']; ?> </td>
								</tr>

								<tr>
									<th>Registered On</th>
									<td> <?php echo $row['date_registered']; ?> </td>
								</tr>

								<tr>
									<th>Industrial Segment</th>
									<td> <?php echo $row['iseg']; ?> </td>
								</tr>

								<tr>
									<th>Route</th>
									<td> <?php echo $row['route']; ?> </td>
								</tr>

								<tr>
									<th>Email Address</th>
									<td> <?php echo $row['email']; ?> </td>
								</tr>

								<tr>
									<th>Mobile Number</th>
									<td> <?php echo $row['mobile']; ?> </td>
								</tr>
							</thead>
						</table>
					</div>
				<!-- /.row -->
				</div>
            <!-- /.container-fluid -->
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
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    

</body>

</html>
