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
	
	echo "Signed in as Admin";
	
	$sql = "SELECT * FROM reservations";
$result = $db->query($sql);

	
}

else {
	
	 // if logged in as User do this...
	
	header("location: login.php");
	
}
}
else {
	
	// if no session logged in do this...
	
	header("location: login.php");
	
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Customers | Admin Page </title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
	
	  <?php include "phpIncludes/header.php";?>
	
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
        <th>#</th>
			<th>Status</th>
      <th>Reservation Date</th>  
			<th>Reservation Slot</th>
        <th>Reservation Name</th>
        <th>Reservation Email</th>
        <th>Reservation Notes</th>
       
			</tr>
			
			<?php
			while($r = $result->fetch(PDO::FETCH_ASSOC)){
				
				?>
			
			<tr>
      <td><?php echo $r['res_id'];?></td>
			<td><?php echo $r['res_date'];?></td>
			<td><?php echo $r['res_slot'] ;?></td>
			<td><?php echo $r['res_name'];?></td>
       <td><?php echo $r['res_email'];?></td>
      <td><?php echo $r['res_tel'];?></td>
         <td><?php echo $r['res_notes'];?></td>
        
					<td><a href="updateReserve.php?id=<?php echo $r['res_id'];?>">Edit</a>
            <a href="deleteReserve.php?id=<?php echo $r['res_id'];?>">Delete</a>
          
          
				</td></tr>
			<?php } ?>
		</table>
			</div>
</div>
	
	
</body>
	
  <?php include "phpIncludes/footer.php";?>

	
</html>

		
		