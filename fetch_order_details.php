<?php

if(isset($_POST["item_id1"])){

	$item_id = $_POST['item_id1'];
	
	
	include("inc/connection.php");
    $query = mysqli_query($con,"SELECT * FROM `inventory` INNER JOIN `suppliertable` ON `suppliertable`.supplier_id = `inventory`.supplier_id  WHERE `inventory`.item_id = '$item_id'") or die(mysqli_error($con));
    
    $rowCount = mysqli_num_rows($query);
    
  
    if($rowCount > 0){
     
        $row = mysqli_fetch_assoc($query);

      $supplier_name = $row['SupplierName']; 
        $price = $row['Rate'];
        $qty = $row['Qty'];
		
		//echo $supplier_name;

      $person = array("supplier"=>$supplier_name,"price"=>$price,"quantity"=>$qty);
         header("Content-Type: application/json");
			echo json_encode($person);
    }else{
        echo '0.00';
    }
}


?>