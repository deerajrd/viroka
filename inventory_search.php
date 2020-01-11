<?php 
include("inc/connection.php");

 $data = "select * from inventory order by item_id asc";  
 $result = mysqli_query($con, $data);  
 ?>  
 <!DOCTYPE html>  
 <html>  
  <head>  
   <title>Inventory Report</title>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  </head>
  <body>  
    <br /><br />
    <h2 align="center">Inventory Report</h2><hr /><br />
    <table border="0" align="center">
      <tbody>
        <tr>
          <td>
            <input type="text" name="fdate" id="fdate" placeholder="From Date" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="tdate" id="tdate" placeholder="To Date" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="search" id="search" value="SEARCH" />
          </td>
        </tr>
      </tbody>
    </table> 
    <br />
    <table border="1" align="center" id="search_table">  
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
     <?php  
     while($row = mysqli_fetch_array($result))  
     {  
     ?>  
      <tr>  
         <td><?php echo $row["item_id"]; ?></td>  
         <td><?php echo $row["supplier_id"]; ?></td>  
         <td><?php echo $row["item_no"]; ?></td>  
         <td><?php echo $row["item_name"]; ?></td>  
         <td><?php echo $row["model"]; ?></td>
         <td><?php echo $row["Qty"]; ?></td>
		 <td><?php echo $row["Rate"]; ?></td>
         <td><?php echo $row["add_inv_date"]; ?></td>
      </tr>  
     <?php  
     }  
     ?>  
     </table> 
  </body>  
 </html>  
 <script>  
  $(document).ready(function(){  
   $.datepicker.setDefaults({  
        dateFormat: 'yy-mm-dd'   
   });  
   $(function(){  
      $("#fdate").datepicker();  
      $("#tdate").datepicker();  
   });  
   $('#search').click(function(){  
      var fdate = $('#fdate').val();  
      var tdate = $('#tdate').val();  
        if(fdate != '' && tdate != '')  
        {  
         $.ajax({  
              url:"search_inv_result.php",  
              method:"POST",  
              data:{fdate:fdate, tdate:tdate},  
              success:function(data)  
              {  
                $('#search_table').html(data);  
              }  
         });  
        }  
        else  
        {  
          alert("Please Select Date");  
        }  
   });  
  });  
 </script>