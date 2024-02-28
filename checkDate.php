  <?php 
  
  try {
   require_once("phpIncludes/config.php");
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
} catch(Exception $e) {
  $error = $e->getMessage();
}
  
  
if(isset($_POST) && !empty($_POST)) {
//   @bookedCheckin = $_POST['date'];
$sql = "SELECT 
  regRoom.regID, roomsBooked.availableID, roomsBooked.roomNumber, roomsBooked.bookedCheckin, roomsBooked.bookedCheckout

FROM
    regRoom
INNER JOIN roomsBooked ON regRoom.regID = roomsBooked.availableID;";


$result = $db->query($sql);

?>
  

<table class="table">
      <tr>
        <th>Room ID</th>
        <th>Booking ID</th>
        <th>Room Number</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
      </tr>
      
      
      <?php
      
      while($r = $result->fetch(PDO::FETCH_ASSOC)) {
        
      ?>
      
      
      <tr>
        
        <td><?php echo $r['regID'];?></td>
        <td><?php echo $r['availableID']?></td>
        <td><?php echo $r['roomNumber'];?></td>
        <td><?php echo $r['bookedCheckin'];?></td>
        <td><?php echo $r['bookedCheckout'];?></td>
      
      </tr>
      
      <?php }} ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style>
  
.dacontainer {

  margin:2em 2em 2em 40em;
}
  
  
  </style>
</head>
    <?php include "phpIncludes/header.php";?>
<body>

 
  


<div class="dacontainer">
  
  
<div class="darow">
  <form method="POST" enctype="multipart/form-data">
  
    <h3>
    Check room availablity by date:
  </h3>
  
  <input type="text" placeholder="Enter a date: (YYYY-MM-DD)" name="date" autocomplete="off" required>
  
  <input id="checkDatebutton" type="submit" name="submitDate" value="Check availablity">
  
  </div>
  
  </div>

    

</body>
    <?php include "phpIncludes/footer.php";?>
</html>
    
     
    
    