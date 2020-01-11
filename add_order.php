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
    $obranch = $steam = $sexe = $smanager = $brandspl = $otype = $orderno = $cpodate = $orsubdate = $delivery = $ovalue = $cname = $iseg = $route = $ctype = $designation = $email = $mobile = $address = $cadvance = $pdel = $ondel = $oninstall = $credit = $shipmemnt = $billing = $cust_po_no = "";
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
                    <label class="control-label">Enter Item Name:</label>
					
                    <select name="item_id" class="form-control border-input" id="item_id">
                   <option value="" disabled="" selected="">Select item</option>
                        <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `inventory`") or die(mysqli_error($con));
                          $count = mysqli_num_rows($sql);
                          if($count > 0)
                          {
                            while($rr = mysqli_fetch_array($sql))
                            {
                              echo '<option value="'.$rr['item_id'].'">'.$rr['item_name'].' </option>';
                            }
                          }
                          else
                          {
                            echo '<option value="">No Item Found</option>';
                          }

                       ?>
                      </select>
                </div>

                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Supplier</label>
                    <input type="text" name="supplier" id="supplier" class="form-control" readonly="readonly" value=""/>     
                </div>

                  <div class="form-group col-md-6 col-xs-6">
                      <label class="control-label">Quantity:</label>
                      <select name="qty" class="form-control border-input" id="quantity">
                      </select>                
                </div>

               

                 <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Price:</label>
                    <input type="text" name="price" class="form-control border-input" id="price" readonly="readonly"/>
                </div>




                

                 <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Branch:</label>
                    <select name="branch" class="form-control border-input" required >
          <option value="" disabled="" selected="">Select Branch</option>
                    <!--<option disabled><?php //echo $obranch; ?></option>-->
                    <option >SOFTWARE SERVICES</option>
                    <option >BANGALORE</option>
                    <option >KOCHI</option>
                    <option >TN UPCOUNTRY</option>
                    <option >KN UPCOUNTRY</option>
                    <option>HYDERABAD</option>
                    <option >AP UPCOUNTRY</option>
                </select>
                </div>


              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Sales Team:</label>
                  <select name="steam" class="form-control border-input" required>
					<option value="" disabled="" selected="">Select Team</option>
                    <!--<option disabled><?php //echo $steam; ?></option>-->
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
                    <label class="control-label" >Sales Manager:</label>
                    <select class="form-control border-input" name="smanager" required >
					<option value="" disabled="" selected="">Select Manager</option>
                      <!-- <option disabled><?php //echo $smanager; ?></option>-->
                       <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE designation = '3'") or die(mysqli_error($con));
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
                    <label class="control-label">Brand Specialist:</label>
                    <select class="form-control border-input" name="bspecialist" required >
					<option value="" disabled="" selected="">Select Brand Spl</option>
                    <!-- <option disabled><?php //echo $brandspl; ?></option>-->
                       <?php
                          include("inc/connection.php");
                          $sql = mysqli_query($con, "SELECT * FROM `employeetable` WHERE designation = '4'") or die(mysqli_error($con));
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
                    <label class="control-label">Select Customer:</label>
					
                    <input type="hidden" class="form-control border-input" name="sexe" value="<?php echo $username; ?>">
                     <select class="form-control border-input" name="customer_id" required >
					 <option value="" disabled="" selected="">Select Customer</option>
                     <!--  <option disabled><?php //echo $customer_id; ?></option>-->
                        <?php
                          include("inc/connection.php");
                          //$sql = mysqli_query($con, "SELECT * FROM `customertable` WHERE username = '$username'") or die(mysqli_error($con));
							$sql = mysqli_query($con, "SELECT * FROM `customertable` WHERE username = '$username'") or die(mysqli_error($con));
                          while($row = mysqli_fetch_array($sql))
                          {
                            echo '<option value="'.$row['c_id'].'">'.$row['cname'].'</option>';
                          }


                        ?>
                    </select>
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Order Type:</label>
                  <select name="otype" class="form-control border-input" required >
				  <option value="" disabled="" selected="">Select Order Type</option>
                  <!-- <option disabled><?php// echo $otype; ?></option>-->
                    <option >VAS</option>
                    <option >UNIX SERVERS</option>
                    <option >STORAGE</option>
                    <option >APPLIANCES</option>
                    <option >POWER CONDITIONING</option>
                    <option >others</option>
                  </select>  
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Order PO No:</label>
                    <input type="text" class="form-control border-input" name="cpono" value="<?php echo $cust_po_no; ?>" required>
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Order PO Date:</label>
                    <input type="date" class="form-control border-input" name="cpodate" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>" value="<?php echo $cpodate; ?>" required>
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">Delivery Committed:</label>
                    <input type="date" class="form-control border-input" name="delcom" min="<?php echo date("Y-m-d") ?>" value="<?php echo $delcom; ?>" required >
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Order Value:</label>
                    <input type="text" class="form-control border-input" name="ovalue" value="<?php echo $ovalue; ?>" required>
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
                    <label class="control-label">Advance:</label>
                    <input type="text" class="form-control border-input" name="advance" value="<?php echo $cadvance; ?>">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Prior to Delivery:</label>
                    <input type="text" class="form-control border-input" name="priorpay" value="<?php echo $pdel; ?>">
                </div>
  
              <div class="form-group col-md-6 col-xs-6">
                  <label class="control-label">On Delivery:</label>
                    <input type="text" class="form-control  border-input" name="ondel" value="<?php echo $ondel; ?>" >
                </div>
  
                <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label">On Installation:</label>
                  <input type="text" class="form-control border-input " name="oninstall" value="<?php echo $oninstall; ?>">
                </div>
          </div>
          
        <!--
          <div class="row">
            <div class="col-md-12">    
              <h3>Delivery Terms</h3>
            </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Part Shipment:</label>
                  <select name="partship" class="form-control border-input">
				  <option value="" disabled="" selected="">Select Part Shipment Permission</option>
                   <!--<option disabled><?php //echo $shipmemnt; ?></option>
                    <option >ALLOWED</option>
                    <option >NOT ALLOWED</option>                   
                  </select>  
                </div>
              
              <div class="form-group col-md-6 col-xs-6">
                    <label class="control-label" >Part Billing:</label>
                  <select name="partbilling" class="form-control border-input">
				  <option value="" disabled="" selected="">Select Part Billing Permission</option>
                   <!--<option disabled><?php //echo $billing; ?></option>
                    <option >ALLOWED</option>
                    <option >NOT ALLOWED</option>                   
                  </select>  
                </div>
            </div>-->


            <div class="row">
			<div class="col-md-12 centered" style="text-align:center;">              
                <div class="form-group">        
                      <button type="submit" name="add_order" class="btn btn-primary btn-block1 btn-info" style="width: 200px;">Submit</button>
                </div>
            </div>
			</div>
            </form>
                 
			</div>          
               <!-- /.container-fluid -->

        </div>
           
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <script type="text/javascript">
$(document).ready(function(){
    $('#item_id').on('change',function(){
        var item_id = $(this).val();
        //alert(item_id);
        if(item_id){
            $.ajax({
                type:'POST',
                url:'fetch_order_details.php',
                data:'item_id1='+item_id,
                success:function(person){
                    $('#price').val(person.price);
                    $('#supplier').val(person.supplier);
                     $('#quantity').html(person.quantity);
                       var selOpts = "";
                     for (i=1; i<=person.quantity; i++)
                      {
                        selOpts += "<option value='"+i+"'>"+i+"</option>";
                      }
                        $('#quantity').html(selOpts);
                }
            }); 
        }else{
            //$('#price').html('0.00');
            //$('#car_type').html('<option value="">Select Destination first</option>'); 
        }
    });
});

$('#quantity').on('change',function(){
    var tot = $('#price').val() * this.value;
    if(tot)
    {
       $('#price').val(tot);
    }
   
});
</script>


</body>
</html>
