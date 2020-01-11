

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
p.input {
    font-weight: 500;
    padding: 10px 0px;
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
							<div class="col-md-3">
    						<div class="form-group">
      							<label class="control-label" for="email">Branch:</label>
								<p class="input">Software Services</p>
							</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Team:</label>
								<p class="input">PSG</p>									
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Executive:</label>
        						<p class="input">Test Executive</p>
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Sales Manager:</label>
								<p class="input">Test Manager</p>
    						</div>
							</div>
						</div>
						<div class="row">
							
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Brand Specialist:</label>
								<p class="input">Test Specialist</p>        						
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Order Type:</label>
								<p class="input">STORAGE</p> 									
    						</div>
							</div>
						</div>
						
						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO No:</label>
								<p class="input">001CNO</p> 
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Customer PO Date:</label>
								<p class="input">01/06/2017</p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Delivery Committed:</label>
								<p class="input">01/06/2017</p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Order Value:</label>
        						<p class="input">2000</p>
    						</div>
						</div>
						</div>
						
						
						<h3>Customer Details</h3>
						<div class="row">
						<div class="col-md-3">
						<div class="form-group">
      							<label class="control-label" for="email">Name:</label>
       							<p class="input">Test Customer</p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Industry Segment:</label>
								<p class="input">Financial Services</p>									
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Route:</label>
									<p class="input">Route 1</p>
    						</div>
						</div>
	
						<div class="col-md-3">	
							<div class="form-group">
     							<label class="control-label" for="email">Customer Type:</label>
									<p class="input">New</p>
    						</div>
						</div>
						</div>
							
						<div class="row">
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Designation:</label>
        						<p class="input">Test Designation</p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Email:</label>
       							<p class="input">test@gmail.com</p>
    						</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
     							<label class="control-label" for="email">Mobile:</label>
        						<p class="input">1234567890</p>
    						</div>
						</div>
						
						<div class="col-md-3">
    						<div class="form-group">
      							<label class="control-label" for="email">Address:</label>
  								<p class="input">Mangalore</p>
    						</div>
						</div>
						</div>
							
	
							<h3> Payment Terms </h3>	
							<div class="row">
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Advance:</label>
        						<p class="input">800</p>
    						</div>
							</div>
							
							<div class="col-md-3">
							<div class="form-group">
      							<label class="control-label" for="email">Prior to Delivery:</label>
       							<p class="input">300</p>
    						</div>
							</div>
							
							<div class="col-md-2">
							<div class="form-group">
     							<label class="control-label" for="email">On Delivery:</label>
        						<p class="input">400</p>
    						</div>
							</div>
				
							<div class="col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Installation:</label>
  								<p class="input">200</p>
    						</div>
							</div>
							
							<div class="col-md-2">
    						<div class="form-group">
      							<label class="control-label" for="email">On Credit:</label>
  								<p class="input">300</p>
    						</div>
							</div>
						</div>
							
							<h3>Delivery Terms</h3>
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Shipment:</label>
								<p class="input">NOT ALLOWED</p>									
    						</div>
							</div>
							
							<div class="col-md-6">
							<div class="form-group">
      							<label class="control-label" for="email">Part Billing:</label>
								<p class="input">NOT ALLOWED</p> 
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
