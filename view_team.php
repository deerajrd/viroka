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
                                <i class="fa fa-dashboard"></i> Dashboard / Team Details
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>

                <?php
					include("inc/connection.php");
					$empid = $_GET['empid'];
					$query = mysqli_query($con,"SELECT * FROM `employeetable` INNER JOIN `team` ON employeetable.teamgroup = team.team_id  WHERE empid = '$empid'") or die(mysqli_error($con));
					$row = mysqli_fetch_array($query);
				?>
			<div class="container-fluid formarea">	
                <div class="row">
                    <div class="col-lg-12">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Employee Name</th>
									<td> <?php echo $row['empname']; ?> </td>
								</tr>

								<tr>
									<th>Designation</th>
									<td> <?php echo $row['designation']; ?> </td>
								</tr>

								<tr>
									<th>Team</th>
									<td> <?php echo $row['team_name']; ?> </td>
								</tr>

								<tr>
									<th>Address</th>
									<td> <?php echo $row['address']; ?> </td>
								</tr>

								<tr>
									<th>Mobile</th>
									<td> <?php echo $row['mobile']; ?> </td>
								</tr>

								<tr>
									<th>Email Address</th>
									<td> <?php echo $row['email']; ?> </td>
								</tr>

								<tr>
									<th>Employee Type</th>
									<td> <?php echo $row['emptype']; ?> </td>
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
