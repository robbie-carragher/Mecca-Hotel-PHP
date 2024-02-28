<?php
session_start();

try {
	require_once("config.php");
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<html>
<head>
   <title>Rooms - DSH Admin</title>
   <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="functions.js"></script>
</head>
<body>

<!-- <?php include "phpinclude/headeradmin.php"; ?> -->
  
  <h2>
    Manage Rooms
  </h2>
  
  
  <h3>
    Regular Rooms:
  </h3>
  
  <?php 
  
  try {
  require_once("config.php");
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
} catch(Exception $e) {
  $error = $e->getMessage();
}
  
  

  

//   @bookedCheckin = $_POST['date'];
  
$sql = "SELECT * FROM regRoom;";


$result = $db->query($sql);
  

?>
  

<table class="table">
      <tr>
       <th>Details</th>
        <th>Pet Friendly?</th>
        <th>Normal Rate</th>
        <th>Slow Rate</th>
        <th>Peak Rate</th>
        <th>Room Number</th>
     
      </tr>
  
      
      
      <?php
      
      while($r = $result->fetch(PDO::FETCH_ASSOC)) {
        
      ?>
      
      
      <tr>
        
        
        <td><?php echo $r['regInfo']?></td>
        <td><?php echo $r['regPets'];?></td>
        <td><?php echo '$ ' . $r['regNormrate'];?></td>
        <td><?php echo '$ ' . $r['regSlowrate'];?></td>
        <td><?php echo '$ ' . $r['regPeakrate'];?></td>
        <td><?php echo $r['roomNo'];?></td>
        
      
        
      </tr>
      
      <?php   }  ?>
  
  
 
  
  <?php
  
  $sql = "SELECT * FROM luxRoom;";


$result = $db->query($sql);
  

?>
  

<table class="table">
      <tr>
        <th>Details</th>
        <th>Pet Friendly?</th>
        <th>Normal Rate</th>
        <th>Slow Rate</th>
        <th>Peak Rate</th>
        <th>Room Number</th>
        
      </tr>
  

      
      <h3>
    Luxury Rooms:
  </h3>
  
      <?php
      
      while($r = $result->fetch(PDO::FETCH_ASSOC)) {
        
      ?>
  
    
      
      
      <tr>
        
        
        <td><?php echo $r['luxInfo']?></td>
        <td><?php echo $r['luxPets'];?></td>
        <td><?php echo '$ ' . $r['luxNormrate'];?></td>
        <td><?php echo '$ ' . $r['luxSlowrate'];?></td>
        <td><?php echo '$ ' . $r['luxPeakrate'];?></td>
        <td><?php echo $r['roomNo'];?></td>
      
        
      </tr>
      
      <?php   }  ?>
  
    <?php
  
  $sql = "SELECT * FROM roomsBooked;";


$result = $db->query($sql);
  

?>
  

<table class="table">
      <tr>
        <th>Room # (Regular)</th>
        <th>Room # (Luxury)</th>
        <th>Booked check in date</th>
        <th>Booked check out date</th>
       
     
      </tr>
      
      <h3>
    Rooms Booked:
  </h3>
      <?php
      
      while($r = $result->fetch(PDO::FETCH_ASSOC)) {
        
      ?>
  
    
      
      
      <tr>
        <td><?php echo $r['regNo'];?></td>
        <td><?php echo $r['luxNo'];?></td>
        <td><?php echo $r['bookedCheckin']?></td>
        <td><?php echo $r['bookedCheckout'];?></td>
        
       
      
        
      </tr>
  
      <?php   }  ?>
  
  </table>
  
 <h3>
   
  
    Add room
 </h3>
  <div id="addroom">

  


  
<form id="addroomform" method="POST" enctype="multipart/form-data">

<input type="text" placeholder="Room Description" name="info" autocomplete="off" required>
<input type="text" placeholder="Pets? 'Yes' or 'No'" name="pets" autocomplete="off" required>
  <input type="number" placeholder="Standard Rate" name="normrate" autocomplete="off" required>
  <input type="number" placeholder="Slow Rate" name="slowrate" autocomplete="off" required>
  <input type="number" placeholder="Peak Rate" name="peakrate" autocomplete="off" required>
    <input type="number" placeholder="Room Number" name="roomNo" autocomplete="off" required>
  
  <label for="type">Room class?</label>
  <select id="type" name="type">
    <option value="Regular">Regular</option>
  <option value="Luxury">Luxury</option>
  </select>

  <input id="addRoombutton" type="submit" name="submitAdd" value="Add room">
 
</form>

  
</div>
  
 <?php

try {
  require_once("phpinclude/config.php");
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
} catch(Exception $e) {
  $error = $e->getMessage();
}
 


if(isset($_POST) && !empty($_POST) && $_POST['type'] === "Luxury") {
$sql = "INSERT INTO diamondsandshotel.luxRoom (luxInfo,luxPets,luxNormrate,luxSlowrate,luxPeakrate,roomNo) 
VALUE (:luxInfo,:luxPets,:luxNormrate,:luxSlowrate,:luxPeakrate,:luxroomNo)";
// PDO HANDLES VARIABLES DIFFERENTLY FROM SQLI

$result = $db->prepare($sql);
$res = $result->execute(
  array(':luxInfo' => $_POST['info'],
        ':luxPets' => $_POST['pets'],
        ':luxNormrate' => $_POST['normrate'],
        ':luxSlowrate' => $_POST['slowrate'],
        ':luxPeakrate' => $_POST['peakrate'],
        ':luxroomNo' => $_POST['roomNo']
       )

);
// PDO HANDLES VARIABLES DIFFERENTLY FROM SQLI
// else {
//   echo "passwords must match";
  
// }
if($res){
  echo "<script>alert('Successfully added room.')</script>";
               
  
  
} else {
  echo "<script>alert('Failed added room.')</script>";
}
// USE BELOW CODE TO CHECK
}   if (isset($_POST) && !empty($_POST) && $_POST['type'] === "Regular") {
  $sql = "INSERT INTO diamondsandshotel.regRoom (regInfo,regPets,regNormrate,regSlowrate,regPeakrate,roomNo) 
VALUE (:regInfo,:regPets,:regNormrate,:regSlowrate,:regPeakrate,:regroomNo)";
// PDO HANDLES VARIABLES DIFFERENTLY FROM SQLI

$result = $db->prepare($sql);
$res = $result->execute(
  array(':regInfo' => $_POST['info'],
        ':regPets' => $_POST['pets'],
        ':regNormrate' => $_POST['normrate'],
        ':regSlowrate' => $_POST['slowrate'],
        ':regPeakrate' => $_POST['peakrate'],
        ':regroomNo' => $_POST['roomNo']
       )

);
  

if($res){
  echo "<script>alert('Successfully added room.')</script>";
               
  
  
} else {
  echo "<script>alert('Failed added room.')</script>";
}


// USE ABOVE CODE TO CHECK


}

// $result2 = $db->query($sqlquery);

  
  
?>
</body>
</html>
  
  
  

  
