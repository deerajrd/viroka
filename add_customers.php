<?php
	include("inc/session.php");
  include("inc/connection.php");
  if(isset($_GET['update_customer']))
  {
    $cust_id = $_GET['cust_id'];
    $sq = mysqli_query($con, "SELECT * FROM `customertable` WHERE c_id = '$cust_id'") or die(mysqli_error($con));
    $rr = mysqli_fetch_array($sq);
    if($rr){
      $cname = $rr['cname'];
      $iseg = $rr['iseg'];
      $route = $rr['route'];
      $ctype = $rr['ctype'];
      $designation = $rr['designation'];
      $email = $rr['email'];
      $mobile = $rr['mobile'];
      $address = $rr['address'];
    }


    $update_customer = $_GET['update_customer'];
    
  }
  else
  {
    $cname = $iseg = $route = $ctype = $designation = $email = $mobile = $address = "";
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
                                <i class="fa fa-dashboard"></i> Dashboard / <?php echo (isset($update_customer) ? "Update Customers" : "Add Customers"); ?> 
                            </li>
                        </ol>
                    </div>
                </div>
			</div>
                <!-- /.row -->
			<div class="container-fluid formarea">
              
               			<form class="form-horizontal1" action="<?php echo (isset($update_customer) ? "customer_val.php?cust_id=".$cust_id."&update_customer" : "customer_val.php?add_customer"); ?>" id="customer_form" method="POST">
						<div class="row">
						<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label">Name:</label>
       							<input type="text" class="form-control border-input" name="cname" pattern="[a-zA-Z\s]{3,}" id="Name" placeholder="Customer Name" value="<?php echo $cname; ?>" required />
    						</div>

							<div class="form-group">
      							<label class="control-label">Industry Segment:</label>
									<select name="iseg" class="form-control border-input" required >
										<option value="" disabled selected>Select Segment</option>
										<!--<option><?php //echo $iseg; ?> </option>-->
										<option >Software Services</option>
										<option >Financial Services</option>
										<option >Media & Publishing</option>
										<option >Consultants</option>
										<option >Builders & Developers</option>
										<option >Hospitality</option>
										<option >Health Care Services</option>
										<option >Telecommunications</option>
										<option >Retail & Distribution</option>
										<option >Research & Development</option>
										<option >Education	</option>
										<option >Utility Services</option>
										<option >BPO/ITES</option>
										<option >Others</option>
									</select>
    						</div>
	
							<div class="form-group">
      							<label class="control-label">Route:</label>
									<select name="route" class="form-control border-input" required>
										<option value="" disabled selected>Select Route</option>
										<!--<option ><?php// echo $route; ?></option>-->
										<option >Route 1</option>
										<option >Route 2</option>
										<option >Route 3</option>
										<option >Route 4</option>
										<option >Route 5</option>
										<option >Route 6</option>
	 								</select>  
    						</div>
	
							<div class="form-group">
     							<label class="control-label" >Customer Type:</label>
									<select name="ctype" class="form-control border-input" required>
										<option value="" disabled selected>Select Customer Type</option>
										<!--<option><?php //echo $ctype; ?></option>-->
										<option >Existing</option>
										<option >New</option>
	 								</select>    
    						</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" >Designation:</label>
        						<input type="text" class="form-control border-input" name="designation"  placeholder="Enter Designation" value="<?php echo $designation; ?>">
    						</div>
	
							<div class="form-group">
      							<label class="control-label" >Email:</label>
       							<input type="email" class="form-control border-input" name="email" placeholder="Enter Email Id"  value="<?php echo $email; ?>" required>
    						</div>
	
							<div class="form-group">
     							<label class="control-label" >Mobile:</label>
        						<input type="text" pattern="[789][0-9]{9}" class="form-control border-input" name="mobno" placeholder="Enter Mobile number"  value="<?php echo $mobile; ?>" required>
    						</div>
	
    						<div class="form-group">
      							<label class="control-label" >Address:</label>
  								<textarea class="form-control border-input" name="add" placeholder="Place Your Address Here" required><?php echo $address; ?></textarea>
    						</div>
						</div>						
    						
						<div class="text-center">
							<button type="submit"  name="add_customer" class="btn btn-info btn-fill btn-wd"><?php echo (isset($update_customer) ? "Update Customers" : "Add New Customer"); ?></button>
						</div>
					</div>					
					<!-- /.row -->		
  					</form>
               		
				

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<!---->

<script>
$(document).ready(function() {
    $('#customer_form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cname: {
                row: '.col-xs-5',
                validators: {
                    notEmpty: {
                        message: 'The Customer name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The Customer name can only consist of alphabetical and space'
                    }
                }
            },
            lastName: {
                row: '.col-xs-5',
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The last name can only consist of alphabetical and space'
                    }
                }
            },
            cellPhone: {
                row: '.col-xs-3',
                validators: {
                    notEmpty: {
                        message: 'The cell phone number is required'
                    }
                }
            },
            homePhone: {
                row: '.col-xs-3',
                validators: {
                    notEmpty: {
                        message: 'The home phone number is required'
                    }
                }
            },
            officePhone: {
                row: '.col-xs-3',
                validators: {
                    notEmpty: {
                        message: 'The office phone number is required'
                    }
                }
            }
        }
    });
});
</script>


</body>
</html>
