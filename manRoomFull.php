<?php
session_start();

try {
  require_once("phpIncludes/config.php");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e) {
	$error = $e->getMessage();
}

if ($_SESSION) {
	
	 // check for session login
	
if ($_SESSION['session_status'] == 'Admin') {
	
	// if logged in as Admin do this...
	
	
	
// 	$sql = "SELECT * FROM Customer_Accounts";
// $result = $db->query($sql);

	
}

else {
	
	 // if logged in as User do this...
	
// 	header("location: reservations.php");

}
}
else {
	
	// if no session logged in do this...
	
// 	header("location: index.php");
	
}



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <h2>
    Manage Rooms
  </h2>
  
  
  <h3>
    Regular Rooms:
  </h3>
    <?php 
  


  

//   @bookedCheckin = $_POST['regID'];
  
$sql = "SELECT * FROM regRoom;";


$result = $db->query($sql);
  

?>
 <table class="table">
      <tr>
       <th>#</th>
        <th>Regular Room info</th>
      
     
      </tr> 
   
    
      <?php
      
      while($r = $result->fetch(PDO::FETCH_ASSOC)) {
        
      ?>
      
      
      <tr>
        
        
          <td><?php echo $r['regID'];?></td>
         <td><?php echo $r['regInfo'];?></td>
     
      
       
       
        
      
        
      </tr>
      
      <?php   }  ?>
   
        <td><?php echo $r['regID'];?></td>
         <td><?php echo $r['regInfo'];?></td>
     
</body>
</html>