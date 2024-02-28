<?php
session_start();
try {
   require_once("phpIncludes/config.php");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
  $error = $e->getMessage();
}

$sql = "SELECT * FROM reservations";
$result = $db->query($sql);


?>

 <!DOCTYPE html>
<html>
<head>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <?php include "phpIncludes/header.php";?>
</head>
   

<body>
<div class="container">
	<div class="row">
    
    <table class="table">
      <tr>
        <th>#</th>
        <th>Reservation Date</th>
        <th>Reservation Time SLot</th>
        <th>Reservation Name</th>
        <th>Reservation Contact</th>
        <th>Reservation Email</th>
      <th>Reservation Notes</th>
      </tr>
      
      <?php

    while($r = $result->fetch(PDO::FETCH_ASSOC)){
      
      
    
      ?>
      
      <tr>
      <td><?php echo $r['res_id'];?></td>
        <td><?php echo $r['res_date'];?></td>
        <td><?php echo $r['res_slot'];?></td>
        <td><?php echo $r['res_name'];?></td>
        <td><?php echo $r['res_tel'];?></td>
        <td><?php echo $r['res_email'];?></td>
        <td><?php echo $r['res_notes'];?></td>
        
        <td><a href="updateReserve.php?id=<?php echo $r['res_id'];?>">Edit</a> <a 
               href="deleteReserve.php?id=<?php echo $r['res_id'];?>">Delete</a></td>
              
        
      </tr>
      
      

      
      <?php } ?> 
      
    </table>
    
    	</div>
</div>
   <?php include "phpIncludes/footer.php";?>
</body>
  

</html>