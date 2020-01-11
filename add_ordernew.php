

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<?php include("inc/head.php"); ?>

<style>
.form-horizontal .form-group {
    margin: 10px 0;
}

</style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
		<?php include("inc/mainmenu.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             Welcome, <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard / Add Order 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				
              	
               			<form class="form-horizontal" action="customer_val.php" method="POST">
						<div class="container">
						<div class="row">
						<div class="col-md-6">
    						<div class="form-group">
      							<label class="control-label" for="email">Branch:</label>					
								
       							<select name="branch" class="form-control">
										<option disabled>Select..</option>
										<option >Software Services</option>
										<option >BANGALORE</option>
										<option >KOCHI</option>
										<option >TN UPCOUNTRY</option>
										<option >KN UPCOUNTRY</option>
										<option>HYDERABAD</option>
										<option >AP UPCOUNTRY</option>
								</select>
    						</div>

							<div class="form-group">
      							<label class="control-label" for="email">Sales Team:</label>
									<select name="steam" class="form-control">
										<option disabled>Select..</option>
										<option >PSG</option>
										<option >ESG</option>
										<option >SSG</option>
										<option >CSG</option>										
									</select>
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Sales Executive:</label>
        						<input type="text" class="form-control" name="sexe">
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Sales Manager:</label>
        						<input type="text" class="form-control" name="smanager">
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Brand Specialist:</label>
        						<input type="text" class="form-control" name="bspl">
    						</div>
	
							<div class="form-group">
      							<label class="control-label" for="email">Order Type:</label>
									<select name="otype" class="form-control">
										<option disabled>Select..</option>
										<option >VAS</option>
										<option >UNIX SERVERS</option>
										<option >STORAGE</option>
										<option >APPLIANCES</option>
										<option >POWER CONDITIONING</option>
										<option >others</option>
	 								</select>  
    						</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO No:</label>
        						<input type="text" class="form-control" name="cpono">
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO Date:</label>
        						<input type="text" class="form-control" name="cpodate">
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Delivery Committed:</label>
        						<input type="text" class="form-control" name="delcom">
    						</div>
							
							<div class="form-group">
      							<label class="control-label" for="email">Order Value:</label>
        						<input type="text" class="form-control" name="ovalue">
    						</div>
						</div>
						</div>
							
						<div class="row">
						<div class="col-md-6">
						<div class="form-group">
      							<label class="control-label" for="email">Name:</label>
       							<input type="text" class="form-control" name="cname" id="Name" placeholder="Customer Name"/>
    						</div>

							<div class="form-group">
      							<label class="control-label" for="email">Industry Segment:</label>
									<select name="iseg" class="form-control">
										<option disabled>Select..</option>
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
      							<label class="control-label" for="email">Route:</label>
									<select name="route" class="form-control">
										<option disabled>Select..</option>
										<option >Route 1</option>
										<option >Route 2</option>
										<option >Route 3</option>
										<option >Route 4</option>
										<option >Route 5</option>
										<option >Route 6</option>
	 								</select>  
    						</div>
	
							<div class="form-group">
     							<label class="control-label" for="email">Customer Type:</label>
									<select name="ctype" class="form-control">
										<option disabled>Select..</option>
										<option >Existing</option>
										<option disabled>New</option>
	 								</select>    
    						</div>
							</div>
							
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Designation:</label>
        						<input type="text" class="form-control" name="designation">
    						</div>
	
							<div class="form-group">
      							<label class="control-label" for="email">Email:</label>
       							<input type="text" class="form-control" name="email" placeholder="Enter Email Id">
    						</div>
	
							<div class="form-group">
     							<label class="control-label" for="email">Mobile:</label>
        						<input type="text" class="form-control" name="mobno" placeholder="Enter Mobile number">
    						</div>
	
    						<div class="form-group">
      							<label class="control-label" for="email">Address:</label>
  								<textarea class="form-control" name="add" placeholder="Place Your Address Here"></textarea>
    						</div>
							</div>
							</div>
							
	
							<h3> Payment Terms </h3>	
							<div class="row">
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Advance:</label>
        						<input type="text" class="form-control" name="advance">
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Prior to Delivery:</label>
       							<input type="text" class="form-control" name="priorpay">
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
     							<label class="control-label" for="email">On Delivery:</label>
        						<input type="text" class="form-control" name="ondel">
    						</div>
							</div>
				
							<div class="col-md-3">
    						<div class="form-group">
      							<label class="control-label" for="email">On Installation:</label>
  								<input type="text" class="form-control" name="oninstall">
    						</div>
							</div>
							
							<h3>Delivery Terms</h3>
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Shipment:</label>
									<select name="partship" class="form-control">
										<option disabled>Select..</option>
										<option >ALLOWED</option>
										<option >NOT ALLOWED</option>										
	 								</select>  
    						</div>
							</div>
							
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Billing:</label>
									<select name="partship" class="form-control">
										<option disabled>Select..</option>
										<option >ALLOWED</option>
										<option >NOT ALLOWED</option>										
	 								</select>  
    						</div>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-12 centered" style="text-align:center;">
    						<div class="form-group">        
        							<button type="submit" name="add_customer" class="btn btn-primary btn-block1" style="width: 200px;">Submit</button>
    						</div>
							</div>
							</div>
							 </div> <!--- container--->
  						</form>
                					
               <!-- /.row -->
			  

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
