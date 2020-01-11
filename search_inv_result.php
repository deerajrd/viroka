<?php  
include("inc/connection.php");

 if(isset($_POST["fdate"], $_POST["tdate"]))  
 {  
  $results = '';  
  $data = "select * from inventory where add_inv_date between '".$_POST["fdate"]."' and '".$_POST["tdate"]."'  
  ";  
  $result = mysqli_query($con, $data);  
  $results .= '  
   <table border="1" align="center">  
     <tr>  
         <th width="5%">item_id:</th>  
         <th width="30%">supplier_id:</th>  
         <th width="10%">item_no:</th>  
         <th width="25%">item_name:</th>  
         <th width="15%">model:</th>
         <th width="15%">Qty</th>
		 <th width="15%">Rate:</th>
         <th width="15%">add_inv_date</th>
     </tr>  
  ';  
  if(mysqli_num_rows($result) > 0)  
  {  
   while($row = mysqli_fetch_array($result))  
   {  
    $results .= '  
     <tr>  
        <td>'. $row["item_id"] .'</td>  
        <td>'. $row["supplier_id"] .'</td>  
        <td>'. $row["item_no"] .'</td>  
        <td>'. $row["item_name"] .'</td>  
        <td>'. $row["model"] .'</td>
        <td>'. $row["Qty"] .'</td>
		<td>'. $row["Rate"] .'</td>
        <td>'. $row["add_inv_date"] .'</td>		
       </tr>  
    ';  
   }  
  }  
  else  
  {  
   $results .= '  
    <tr>  
         <td colspan="6">No Records Found</td>  
    </tr>  
   ';  
  }  
  $results .= '</table>';  
  echo $results;  
 }  
 ?>