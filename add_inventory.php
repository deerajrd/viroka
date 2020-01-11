<?php
  include("inc/session.php");
  include("inc/connection.php");
  if(isset($_GET['update_inventory']))
  {
    $item_id = $_GET['item_id'];
    $sq = mysqli_query($con, "SELECT * FROM `inventory` WHERE item_id = '$item_id'") or die(mysqli_error($con));
    $rr = mysqli_fetch_array($sq);
    if($rr){
      $itemno = $rr['item_no'];
      $supplier_id = $rr['supplier_id'];
      $itemname = $rr['item_name'];
      $imodel = $rr['model'];
      $noofunit = $rr['Qty'];
      $price = $rr['Rate'];      
    }


    $update_inventory = $_GET['update_inventory'];
    
  }
  else
  {
    $itemno = $itemname = $imodel = $noofunit = $price = $supplier_id ="";
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
                                <i class="fa fa-dashboard"></i> Dashboard / <?php echo (isset($update_inventory) ? "Update inventory" : "Add inventory"); ?> 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>
			
			<div class="container-fluid formarea">
               
                <form class="form-horizontal1" action="<?php echo (isset($update_inventory) ? "inventory_val.php?item_id=".$item_id."&update_inventory" : "inventory_val.php?add_inventory"); ?>" method="POST">
				<div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="item_no">Item number:</label>
                        <input type="text" class="form-control border-input" name="item_no" pattern="[0-9]{3,}" id="INo" value="<?php echo $itemno; ?>" placeholder="Item No" required />
                    </div>
            
					<div class="form-group">
						<label for="item_name">Item Name:</label>
						<input type="text" class="form-control border-input" pattern="[a-zA-Z\s]{3,}" name="item_name" id="IName" placeholder="Enter Item Name" value="<?php echo $itemname; ?>" required />
					</div>

					<div class="form-group">
						<label for="supplier">Supplier:</label>
						<select name="supplier_id" class="form-control border-input" required>
						<option value="" disabled selected>Select Supplier Type</option>
						<!--<option value = "<?php //echo $supplier_id; ?>"></option>-->
						<?php
						include("inc/connection.php");
						$sql = mysqli_query($con, "SELECT * FROM `suppliertable`") or die(mysqli_error($con));
						while($row = mysqli_fetch_array($sql))
						{
						  echo '<option value="'.$row['supplier_id'].'">'.$row['SupplierName'].'</option>';
						}

						?>                  
						</select>               
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Item Model:</label>
						<select name="item_model" class="form-control border-input" required>
							<option value="" disabled selected>Select Model</option>
							<!--<option><?php //echo $imodel; ?></option>-->
							<option >Model 1</option>
							<option >Model 2</option>
							<option >Model 3</option>
							<option >Model 4</option>					  
						</select>               
					</div>
              
					<div class="form-group">
						<label for="email">Quantity:</label>
						<input type="number" class="form-control border-input" name="item_qty" placeholder="Total Quantity" value="<?php echo $noofunit; ?>" required />
					</div>
  
					<div class="form-group">
						<label  for="email">Price:</label>
						<input type="text" class="form-control border-input" name="rate" pattern="[0-9]{2,}" placeholder="Price Per Item" value="<?php echo $price; ?>" required />
					</div>
				</div>
					<div class="text-center">       
						<button type="submit" name="add_inventory" class="btn btn-info btn-fill btn-wd"> <?php echo (isset($update_inventory) ? "Update Inventory" : "Add New Inventory"); ?></button>
					</div>
				
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

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
