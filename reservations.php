<!-- <script src="functions.js"></script> -->
  
  


<?php
session_start();
try {
  require_once("phpIncludes/config.php");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
  $error = $e->getMessage();
}


if ($_SESSION) {
	
	 // check for session login
	
if ($_SESSION['session_status'] == 'Admin') {
	
	// if logged in as Admin do this...
	
		header("location: login.php");
	
	$sql = "SELECT * FROM reservations";
$result = $db->query($sql);

	
}

else {
	

}
  
}
else {
	
	// if no session logged in do this...
	
// 	header("location: cusReservations.php");
	
}



  
if(isset($_POST) && !empty($_POST)) {
  $sql = "INSERT INTO reservations (res_date,res_slot,res_name,res_email,res_tel,res_notes) 
  VALUE(:res_date,:res_slot,:res_name,:res_email,:res_tel,:res_notes)";

// PDO handles variables differently
  $result = $db->prepare($sql);
  $res = $result->execute(
    array(':res_date' => $_POST['resdate'],
         ':res_slot' => $_POST['slot'],
         ':res_name' => $_POST['fullname'],
         ':res_email' => $_POST['email'],
         ':res_tel' => $_POST['phone'],
         ':res_notes' => $_POST['resnotes']
         
         ));
  
      if($res){
      echo "<br>" . "successfully entered into database";
    } else {
      echo "failed to create record";
    }
}

 
 ?>

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
  
<style>
  
  
.view {
    margin-left: 50%;
}
  
  a {
    font-size:2em;
    color:white;
    background-color:blue;
    margin-bottom: 2em;
    
  }
  a:hover{color: green;}
  
    
.dacontainer {

  margin:2em 2em 2em 40%;
}
  
  
  </style>
  
  
  
	<title>Reservations</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
    <?php include "phpIncludes/header.php";?>
<body>
  
  <?php include "phpIncludes/hero.php";?>

  
  
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Create a reservation</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Resevation Date</label>
			    <div class="col-sm-10">
			      <input type="date" name="resdate"  class="form-control" id="input1" placeholder="Resevation Date" />
			    </div>
			</div>

		
			<div class="form-group" class="radio">
			<label for="input1" class="col-sm-2 control-label">Reservation Time Slot</label>
			<div class="col-sm-10">
			  <label>
			    <input type="radio" name="slot" id="optionsRadios1" value="male" checked>AM
			  </label>
			  	  <label>
			    <input type="radio" name="slot" id="optionsRadios1" value="female"> PM
			  </label>
			</div>
			</div>
      
      			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Full Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="fullname"  class="form-control" id="input1" placeholder="Full Name" />
			    </div>
			</div>
      
      	<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" placeholder="E-Mail" />
			    </div>
			</div>
      
      	<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="text" name="phone"  class="form-control" id="input1" placeholder="Phone" />
			    </div>
			</div>
      
       	<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Reservation Notes</label>
			    <div class="col-sm-10">
			      <input type="text" name="resnotes"  class="form-control" id="input1" placeholder="Reservation Notes" />
			    </div>
			</div>


			<input id="refresh" type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
	</div>
</div>
  


  

 
    
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





  






