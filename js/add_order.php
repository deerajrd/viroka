<?php
  include("inc/session.php");
  include("inc/connection.php");
  if(isset($_GET['update_order']))
  {
    $order_id = $_GET['order_id'];
    $sq = mysqli_query($con, "SELECT * FROM `ordertable` INNER JOIN `team` ON `ordertable`.team_id = `team`.team_id INNER JOIN customertable ON `ordertable`.c_id = `customertable`.c_id INNER JOIN `paymenttable` ON `ordertable`.ORno = `paymenttable`.order_id WHERE ORno = '$order_id'") or die(mysqli_error($con));
    $rr = mysqli_fetch_array($sq);
    if($rr){
      $obranch = $rr['Branch'];
      $steam = $rr['team_name'];

      $customer_id = $rr['cname'];
      //$sexe = 
      $smanager = $rr['SalesManager'];
      $brandspl = $rr['BrandSpl'];
      $otype = $rr['OrderType'];
      $cust_po_no = $rr['CostPOno'];
      $cpodate = $rr['CustPOdate'];
      $orsubdate = $rr['ORNSubDate'];
      $delcom = $rr['DeliveryCommitted'];
      $ovalue = $rr['OrderValue'];    
   
      $cadvance = $rr['Advance'];
      $pdel = $rr['PriortoDelivery'];
      $ondel = $rr['ondelivery'];
      $oninstall = $rr['oninstallation'];   
      $credit = $rr['Credit'];
      $shipmemnt = $rr['partshipment'];
      $billing = $rr['partbilling'];
    }


    $update_order = $_GET['update_order'];
    
  }
  else
  {
    $obranch = $steam = $sexe = $smanager = $brandspl = $otype = $orderno = $cpodate = $orsubdate = $delivery = $ovalue = $cname = $iseg = $route = $ctype = $designation = $email = $mobile = $address = $cadvance = $pdel = $ondel = $oninstall = $credit = $shipmemnt = $billing ="";
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
                                <i class="fa fa-dashboard"></i> Dashboard / <?php echo (isset($update_order) ? "Update Order" : "New Order"); ?> 
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
			</div>

			<div class="container-fluid formarea">	
                <div class="row">
                    <form  action="<?php echo (isset($update_order) ? "order_val.php?order_id=".$order_id."&update_order" : "order_val.php?add_order"); ?>" method="POST">
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Branch:</label>
                    <select name="branch" class="form-control">
                    <option disabled><?php echo $obranch; ?></option>
                    <option >Software Services</option>
                    <option >BANGALORE</option>
                    <option >KOCHI</option>
                    <option >TN UPCOUNTRY</option>
                    <option >KN UPCOUNTRY</option>
                    <option>HYDERABAD</option>
                    <option >AP UPCOUNTRY</option>
                </select>
                </div>

              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Sales Team:</label>
                  <select name="steam" class="form-control">
                    <option disabled><?php echo $steam; ?></option>
                       <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `team`") or die(mysqli_error($con));
                          $count = mysqli_num_rows($sql);
                          if($count > 0)
                          {
                            while($rr = mysqli_fetch_array($sql))
                            {
                              echo '<option value="'.$rr['team_id'].'">'.$rr['team_name'].'</option>';
                            }
                          }
                          else
                          {
                            echo '<option value="">No Team Found</option>';
                          }

                       ?>           
                  </select>
                </div>
              

              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Sales Manager:</label>
                    <select class="form-control" name="smanager">
                       <option disabled><?php echo $smanager; ?></option>
                       <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE teamgroup = '5'") or die(mysqli_error($con));
                          $count = mysqli_num_rows($sql);
                          if($count > 0)
                          {
                            while($rr = mysqli_fetch_array($sql))
                            {
                              echo '<option value="'.$rr['empname'].'">'.$rr['empname'].'</option>';
                            }
                          }
                          else
                          {
                            echo '<option value="">No Sales Manager Found</option>';
                          }

                       ?>
                    </select>
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Brand Specialist:</label>
                    <select class="form-control" name="bspecialist">
                     <option disabled><?php echo $brandspl; ?></option>
                       <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE teamgroup = '6'") or die(mysqli_error($con));
                          $count = mysqli_num_rows($sql);
                          if($count > 0)
                          {
                            while($rr = mysqli_fetch_array($sql))
                            {
                              echo '<option value="'.$rr['empname'].'">'.$rr['empname'].'</option>';
                            }
                          }
                          else
                          {
                            echo '<option value="" disabled>No Brand Specialist Found</option>';
                          }

                       ?>
                    </select>
                </div>

                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Select Customer:</label>
                    <input type="hidden" class="form-control" name="sexe" value="<?php echo $username; ?>">
                     <select class="form-control" name="customer_id">
                       <option disabled><?php echo $customer_id; ?></option>
                        <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `customertable` WHERE username = '$username'") or die(mysqli_error($con));
                          while($row = mysqli_fetch_array($sql))
                          {
                            echo '<option value="'.$row['c_id'].'">'.$row['cname'].'</option>';
                          }


                        ?>
                    </select>
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Order Type:</label>
                  <select name="otype" class="form-control">
                   <option disabled><?php echo $otype; ?></option>
                    <option >VAS</option>
                    <option >UNIX SERVERS</option>
                    <option >STORAGE</option>
                    <option >APPLIANCES</option>
                    <option >POWER CONDITIONING</option>
                    <option >others</option>
                  </select>  
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Order PO No:</label>
                    <input type="text" class="form-control" name="cpono" value="<?php echo $cust_po_no; ?>">
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Order PO Date:</label>
                    <input type="date" class="form-control" name="cpodate"  value="<?php echo $cpodate; ?>" >
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Delivery Committed:</label>
                    <input type="date" class="form-control" name="delcom" value="<?php echo $delcom; ?>" >
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Order Value:</label>
                    <input type="text" class="form-control" name="ovalue" value="<?php echo $ovalue; ?>">
                </div>
            </div>
              
              
             <!-- <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Name:</label>
                    <input type="text" class="form-control" name="cname" id="Name" placeholder="order Name"/>
                </div>

              <div class="form-group col-md-6 col-xs-6">
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
                    <option >Education  </option>
                    <option >Utility Services</option>
                    <option >BPO/ITES</option>
                    <option >Others</option>
                  </select>
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
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
  
              <div class="form-group col-md-6 col-xs-6">
                  <label class="control-label" for="email">order Type:</label>
                  <select name="ctype" class="form-control">
                    <option disabled>Select..</option>
                    <option >Existing</option>
                    <option disabled>New</option>
                  </select>    
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Designation:</label>
                    <input type="text" class="form-control" name="designation">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter Email Id">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                  <label class="control-label" for="email">Mobile:</label>
                    <input type="text" class="form-control" name="mobno" placeholder="Enter Mobile number">
                </div>
  
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Address:</label>
                  <textarea class="form-control" name="add" placeholder="Place Your Address Here"></textarea>
                </div> -->
              
          <div class="row">
            <div class="col-md-12">
              <h3> Payment Terms </h3>  
            </div>
          
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Advance:</label>
                    <input type="text" class="form-control" name="advance" value="<?php echo $cadvance; ?>">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Prior to Delivery:</label>
                    <input type="text" class="form-control" name="priorpay" value="<?php echo $pdel; ?>">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                  <label class="control-label" for="email">On Delivery:</label>
                    <input type="text" class="form-control" name="ondel" value="<?php echo $ondel; ?>" >
                </div>
  
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">On Installation:</label>
                  <input type="text" class="form-control" name="oninstall" value="<?php echo $oninstall; ?>">
                </div>
          </div>
          

          <div class="row">
            <div class="col-md-12">    
              <h3>Delivery Terms</h3>
            </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Part Shipment:</label>
                  <select name="partship" class="form-control">
                   <option disabled><?php echo $shipmemnt; ?></option>
                    <option >ALLOWED</option>
                    <option >NOT ALLOWED</option>                   
                  </select>  
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" for="email">Part Billing:</label>
                  <select name="partbilling" class="form-control">
                   <option disabled><?php echo $billing; ?></option>
                    <option >ALLOWED</option>
                    <option >NOT ALLOWED</option>                   
                  </select>  
                </div>
            </div>


            <div class="row">
              <div class="col-md-12">
               <div class="form-group">        
                      <button type="submit" name="add_order" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
              </form>
                  </div>
			</div>          
               <!-- /.container-fluid -->

        </div>
           
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
