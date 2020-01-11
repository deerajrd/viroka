<?php
	include("inc/session.php");
  include("inc/connection.php");
  if(isset($_GET['update_supplier']))
  {
    $sup_id = $_GET['sup_id'];
    $sq = mysqli_query($con, "SELECT * FROM `suppliertable` WHERE supplier_id = '$sup_id'") or die(mysqli_error($con));
    $rr = mysqli_fetch_array($sq);
    if($rr){
      $supname = $rr['SupplierName'];
      $stype = $rr['SupplierType'];
      $sdes = $rr['Designation'];
      $semail = $rr['Email'];
      $smob = $rr['Mobile'];
      $saltno = $rr['AltMobile'];
      $sphone = $rr['Phone'];
      $sadd = $rr['Address'];
	  $scity = $rr['City'];
      $spin = $rr['Pin'];
      $sfax = $rr['Fax'];
	    
    }


    $update_supplier = $_GET['update_supplier'];
    
  }
  else
  {
    $supname = $stype = $sdes = $semail = $smob = $saltno = $sphone = $sadd = $sadd = $scity = $spin = $sfax = "";
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
                                <i class="fa fa-dashboard"></i> Dashboard / <?php echo (isset($update_supplier) ? "Update Supplier" : "Add Supplier"); ?> 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
				
			<div class="container-fluid formarea">
              	
               			<form class="form-horizontal1" action="<?php echo (isset($update_supplier) ? "supplier_val.php?sup_id=".$sup_id."&update_supplier" : "supplier_val.php?add_supplier"); ?>" method="POST">
    					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
							  <label for="snmae">Supplier Name:</label>
							  <input type="text" class="form-control border-input" name="SupName" placeholder="Enter Name" pattern="[a-zA-Z\s]{3,}" value="<?php echo $supname; ?>" required>
							</div>
							<div class="form-group">
							  <label>Supplier Type:</label>
							<select name="SupType" class="form-control border-input" required >
									<option value="" disabled selected>Select Supplier Type</option>
									<!--<option><?php //echo $stype; ?></option>-->
									<option >New</option>
									<option >Existing</option>
							</select>
							</div>
							
							<div class="form-group">
							  <label>Designation:</label>
								<input type="text" class="form-control border-input" name="SupDes" placeholder="Designation" value="<?php echo $sdes; ?>" />
							</div>
							
							
							<div class="form-group">
							  <label>Email:</label>
								<input type="email" class="form-control border-input" name="SupEmail" placeholder="Enter Email Id" value="<?php echo $semail; ?>" required >
							</div>
							
							<div class="form-group">
							  <label>Mobile:</label>
								<input type="text" class="form-control border-input" name="SupMobNo" placeholder="Enter Mobile number" pattern="[789][0-9]{9}" value="<?php echo $smob; ?>" required >
							</div>							
							
							<div class="form-group">
							  <label>Alternate Mobile:</label>
								<input type="text" class="form-control border-input" name="SupAltNo" placeholder="Enter Mobile number" pattern="[789][0-9]{9}" value="<?php echo $saltno; ?>" >
							</div>
						</div>
						
						<div class="col-md-6">						
							<div class="form-group">
							  <label>Phone:</label>
								<input type="text" pattern="[789][0-9]{9}" class="form-control border-input" pattern="[789][0-9]{9}" name="SupPhone" placeholder="Enter Mobile number" value="<?php echo $sphone; ?>" required >
							</div>
							
							<div class="form-group">
							  <label>Address:</label>
							  <textarea class="form-control border-input" name="Supadd" placeholder="Mention Street Address" required ><?php echo $sadd; ?></textarea>
							</div>
							
							<div class="form-group">
							  <label>City:</label>
								<input type="text" class="form-control border-input" name="SupCity" pattern="[a-zA-Z\s]{3,}" placeholder="Enter City" value="<?php echo $scity; ?>" required >
							</div>
							
							<div class="form-group">
							  <label>Pin:</label>
								<input type="text" maxlength="6" class="form-control border-input" pattern="[0-9]{6,6}" name="SupPin" placeholder="Enter PIN COde" value="<?php echo $spin; ?>" required>
							</div>
							
							<div class="form-group">
							  <label>FAx:</label>
								<input type="text" class="form-control border-input" name="SupFax" pattern="[0-9]{9,}" placeholder="Enter FAX" value="<?php echo $sfax; ?>">
							</div>
						</div>
						</div>
    						<div class="text-center">          
        							<button type="submit" name="add_supplier" class="btn btn-info btn-fill btn-wd"> <?php echo (isset($update_supplier) ? "Update Supplier" : "Add New Supplier"); ?></button>
    						</div>
  						</form>
               		

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
