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
	
	$sql = "SELECT * FROM guest";
$result = $db->query($sql);

	
}

else {
	
	 // if logged in as User do this...
	
	header("location: login.php");
	
}
}
else {
	
	// if no session logged in do this...
	
// 	header("location: login.php");
	
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Guests | Admin Page </title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
	
  <?php include "phpIncludes/header.php";?>
	
<body>
    <?php include "phpIncludes/hero.php";?>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
			<th>#</th>
			<th>First Name</th>
     	<th>Last Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Phone</th>
			<th>Email</th>
        <th>Password</th>
        <th>Admin</th>

			</tr>
			
			<?php
			while($r = $result->fetch(PDO::FETCH_ASSOC)){
				
				?>
			
			<tr>
			<td><?php echo $r['guestID'];?></td>
			<td><?php echo $r['guestFname'] . " " . $r['guestLname'];?></td>
			<td><?php echo $r['guestAddress'];?></td>
			<td><?php echo $r['guestCity'];?></td>
			<td><?php echo $r['guestContact'];?></td>
			<td><?php echo $r['guestEmail'];?></td>
        <td><?php echo $r['guestPassword'];?></td>
        <td><?php echo $r['guestAdmin'];?></td>
        
     
				<td><a href="updateGuest.php?id=<?php echo $r['guestID'];?>">Edit</a>
          <a href="deleteGuest.php?id=<?php echo $r['guestID'];?>">Delete</a>
				</td></tr>
      
    

			<?php } ?>
		</table>
			</div>
</div>
	
	
</body>
  <?php include "phpIncludes/footer.php";?>
	
</html>

		
		