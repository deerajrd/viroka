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
					$supplier_id = $_GET['sup_id'];
					$query = mysqli_query($con,"SELECT * FROM `suppliertable` WHERE supplier_id = '$supplier_id'") or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
				?>
			<div class="container-fluid formarea">
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Supplier Name</th>
									<td> <?php echo $row['SupplierName']; ?> </td>
								</tr>

								<tr>
									<th>Supplier Type</th>
									<td> <?php echo $row['SupplierType']; ?> </td>
								</tr>

								<tr>
									<th>Designation</th>
									<td> <?php echo $row['Designation']; ?> </td>
								</tr>

								<tr>
									<th>Email</th>
									<td> <?php echo $row['Email']; ?> </td>
								</tr>

								<tr>
									<th>Mobile</th>
									<td> <?php echo $row['Mobile']; ?> </td>
								</tr>

								<tr>
									<th>Alternate Mobile</th>
									<td> <?php echo $row['AltMobile']; ?> </td>
								</tr>

								<tr>
									<th>Phone</th>
									<td> <?php echo $row['Phone']; ?> </td>
								</tr>

								<tr>
									<th>Address</th>
									<td> <?php echo $row['Address']; ?> </td>
								</tr>

								<tr>
									<th>City</th>
									<td> <?php echo $row['City']; ?> </td>
								</tr>
								
								<tr>
									<th>Pin</th>
									<td> <?php echo $row['Pin']; ?> </td>
								</tr>
								
								<tr>
									<th>FAx</th>
									<td> <?php echo $row['Fax']; ?> </td>
								</tr>
								
							</thead>
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
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    

</body>

</html>
