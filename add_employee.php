<?php

	include("inc/session.php");

  include("inc/connection.php");

  if(isset($_GET['update_employee']))

  {

    $empid = $_GET['empid'];

    $sq = mysqli_query($con, "SELECT * FROM `employeetable` WHERE empid = '$empid'") or die(mysqli_error($con));

    $rr = mysqli_fetch_array($sq);

    if($rr){

      $empname = $rr['empname'];

      $empdesig = $rr['designation'];

      $teamgrp = $rr['teamgroup'];

      $emptype = $rr['emptype'];

      $empmail = $rr['email'];

      $empmob = $rr['mobile'];

      $empadd = $rr['address'];

      $eusername = $rr['eusername'];

      $epassword = $rr['epassword'];

	    

    }





    $update_employee = $_GET['update_employee'];

    

  }

  else

  {

    $empname = $empdesig = $teamgrp = $emptype = $empmail = $empmob = $empadd = $eusername = $epassword = "";

  }

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

                                <i class="fa fa-dashboard"></i> Dashboard / <?php echo (isset($update_employee) ? "Update Employee" : "Add Employee"); ?> 

                            </li>

                        </ol>

                    </div>

                </div>

                <!-- /.row -->

			</div>

			

			<div class="container-fluid formarea">

              	

               		<form class="form-horizontal1" action="<?php echo (isset($update_employee) ? "employee_val.php?empid=".$empid."&update_employee" : "employee_val.php?add_employee"); ?>" method="POST">

					<div class="row">

					<div class="col-md-6">

    					<div class="form-group">

							<label for="ename">Employee Name:</label>

							<input type="text" class="form-control border-input" name="ename" pattern="[a-zA-Z\s]{3,}" placeholder="Enter Name" value="<?php echo $empname; ?>" required />

						</div>





						<div class="form-group">

							<label for="uname">Username:</label>

							<input type="text" class="form-control border-input" name="eusername" placeholder="Username" value="<?php echo $eusername; ?>" required />

						</div>

						

						<div class="form-group">

							<label for="email">Password:</label>

							<input type="password" class="form-control border-input" name="epassword" pattern="[a-zA-Z0-9\s]{6,8}" placeholder="Password" value="<?php echo $epassword; ?>" required />

						</div> 

							

						<!--<div class="form-group">

							<label>Designation:</label>

							<input type="text" class="form-control border-input" name="edesig" placeholder="Designation" value="<?php echo $empdesig; ?>" required />

						</div>-->

						<div class="form-group">
							<label for="user_type">Designation:</label>
							<Select name="edesig" id="type" class="form-control border-input">
								<option value="">--Select--</option>
								<option value="2">Sales Executive</option>
								<option value="3">Sales Manager</option>
								<option value="4">Brand Manager</option>
								<option value="5">Technical Team</option>
								<option value="6">Accounts Team</option>
							</Select>
						</div>

							

						
							

					</div>

					<div class="col-md-6">

						<div class="form-group">

							<label for="Etype">Employee Type:</label>

							<select name="emptype" class="form-control border-input" required >

								<option value="" disabled selected>Select Employee Type</option>

								
								<option >Experienced</option>

								<option >Fresher</option>

							</select>

						</div>

							

						<div class="form-group">

							<label for="email">Email:</label>

							<input type="email" class="form-control border-input" name="empmail" placeholder="Enter Email Id" value="<?php echo $empmail; ?>" required>

						</div>

							

						<div class="form-group">
						
						

							<label for="mob">Mobile:</label>

							<input type="text" title="mobile number not valid" pattern="[789][0-9]{9}" class="form-control border-input"  name="empmob" placeholder="Enter Mobile number" value="<?php echo $empmob; ?>" required>

						</div>	

						<div class="form-group" id="row_dim">

							<label for="">Team Group:</label>

							<select name="teamgrp" class="form-control border-input" >

							<option value="" disabled selected>Select Team Group</option>
							<!-- <option>Sales Executive </option> Like this we need
							<option>Sales Manager</option>
							<option>Brand Specialist</option>
							<option>Technical</option>
							<option>Accounts</option> -->
				

							<!--<option disabled><?php //echo $teamgrp; ?></option>-->

								<?php

									include("inc/connection.php");

									$sql = mysqli_query($con, "SELECT * FROM `team`") or die(mysqli_error($con));

									while($rr = mysqli_fetch_array($sql))

										{

											echo '<option value="'.$rr['team_id'].'">'.$rr['team_name'].'</option>';

										}

								?>

							</select>

						</div>				
				
						   		

					</div>	




					</div>


					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

							<label for="add">Address:</label>

							<textarea class="form-control border-input" name="empadd" placeholder="Place Your Address Here...." required><?php echo $empadd; ?></textarea>

						</div>

						
					</div>
				</div>

    					<div class="text-center">       

        					<button type="submit" name="add_customer" class="btn btn-info btn-fill btn-wd"> <?php echo (isset($update_employee) ? "Update Employee" : "Add New Employee"); ?></button>

    					</div>

					

  				</form>

               		

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



    <script type="text/javascript">
    	$(function() {
    		$('#row_dim').hide(); 
    		$('#type').change(function(){
        		if($('#type').val() == '2') {
           			$('#row_dim').show(); 
        		} else {
            		$('#row_dim').hide(); 
        		} 
    		});
		});
    </script>

</body>

</html>

