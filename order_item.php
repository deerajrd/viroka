<?php
	include("inc/session.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>	Medical	</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">
	 <!-- Morris Charts CSS -->
    <link href="css/style.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
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
                        <h3 class="page-header text-center">
                             Order Item
                        </h3>
                    </div>
                </div>
                <!-- /.row -->

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr>
							<th>Order Id: <span class="ans"><?php echo $_POST['o_id']; ?></span> </th>
							<th>Order Date: <span class="ans"><?php echo date("d-m-Y"); ?></span> </th>
						</tr>

						<tr>
							<th>Medical Name: <span class="ans"><?php echo $_POST['mname']; ?> </span></th>
							<th>Representative Id: <span class="ans"><?php echo $username; ?></span> </th>
						</tr>											
					</table>	
				</div>
			</div>	
            <!-- /.row -->
				
			<div class="row">
				<div class="col-md-12 column">
					<form name="" method="post" action="order_item_val.php">
					
						<input type="hidden" name="o_id" value="<?php echo $_POST['o_id']; ?>">
						<input type="hidden" name="mname" value="<?php echo $_POST['mname']; ?>">
						
						<table class="table table-bordered table-hover" id="tab_logic">
							<thead>
								<tr>
									<th class="text-center">
										#
									</th>
									<th class="text-center">
										Item
									</th>
									<th class="text-center">
										Quantity
									</th>
									
									<th class="text-center">
										Price
									</th>
								</tr>
							</thead>
							
							<tbody>
								<tr id='addr0'>
									<td>
										1
									</td>
									<td>
										<!--<input type="text" name='item0'  placeholder='Item Name' class="form-control"/>-->
										<select name="item0"  onchange="getprice(this.value)" class="form-control Category">
											<?php
												include("inc/connection.php");
												$ee = mysqli_query($con,"SELECT * FROM `add_product`") or die(mysqli_error($con));
												while($rr = mysqli_fetch_array($ee))
												{
													echo '<option value="'.$rr[0].'">'.$rr['name'].'</option>';
												}
											?>
										</select>
									</td>
									
									<td>
										<input type="text" name='qty0' placeholder='Quantity' id="quantity" class="form-control"/>
										<input type="hidden" name='value' id="value" value="1" />
									</td>
									
									<td>
										<input type="text" id="myprice" name='price0' placeholder='Price' class="form-control"/>
									</td>
								</tr>
								<tr id='addr1'></tr>
							</tbody>
						</table>
							
						<div class="row">
							<div class="col-md-12 column">
								<div class="btn-group">
									<a id="add_row" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add New</a>
									<a id='delete_row' class="btn btn-danger"><i class="fa fa-trash-o">&nbsp;</i>Delete</a>
									<button type="submit" class="btn btn-success"><i class="fa fa-check">&nbsp;</i>Submit</button>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>

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
	
	<script>
	
	     $(document).ready(function(){
      var i=1;
	  var  php = '<?php $ee = mysqli_query($con,"SELECT * FROM `add_product`"); while($rr = mysqli_fetch_array($ee)){echo '<option value="'.$rr[0].'">'.$rr[2].'</option>'; }?>';
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><select name='item"+i+"' id='item"+i+"' onchange='getpricee(this.name)' class='form-control Category'>" + php + "</select> </td><td><input  name='qty"+i+"' id='qty"+i+"' type='text' placeholder='Quantity' onKeyUp=tottt(this.name)  class='form-control input-md'></td><td><input type='text' name='price"+i+"' placeholder='Price' id='myprice"+i+"' class='form-control input-md'/></td>");
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++;
	var ann = i;
	document.getElementById('value').value = ann;
	//alert(ann);
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});
	
	</script>
	
	<script>
	function getprice(length) {
              $.ajax({
                  type:'post',
                  url:'getprprice.php',
                  data:{category:$(".Category option:selected").val()},
                  success:function (data) {
                    $("#myprice").val(data);
					//alert(data);
                  }
              })
      }
	  
	  
	  $('#quantity').on('keyup',function(){
		
    var tot = $('#myprice').val() * this.value;
	if(tot){
		$('#myprice').val(tot);
	}
	
    
});
	</script>
	<script>
	function getpricee(length) {
		var i=length.split("item");
              $.ajax({
                  type:'post',
                  url:'getprprice.php',
                  data:{category:$("#item"+i[1]).val()},
                  success:function (data) {
                    $("#myprice"+i[1]).val(data);
					//alert(data);
                  }
              })
      }
	  
	</script>
	<script>
	function tottt(l){
	 var j=l.split("qty");
    var tot = $('#myprice'+j[1]).val() * $('#qty'+j[1]).val();
	if(tot){
		$('#myprice'+j[1]).val(tot);
	  }
	}
	</script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>