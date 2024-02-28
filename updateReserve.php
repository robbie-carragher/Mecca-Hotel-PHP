
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
		
		
$selsql = "SELECT * FROM reservations WHERE res_id=?";
$selresult = $db->prepare($selsql);
$selres = $selresult->execute(array($_GET['id']));
$r = $selresult->fetch(PDO::FETCH_ASSOC);


if(isset($_POST) && !empty($_POST)) {
	
    
    $sql ="UPDATE reservations SET res_date=?, res_name=?, res_email=?, res_tel=?, res_phone=?, res_notes=? WHERE res_id=?";

$result = $db->prepare($sql);
$res = $result->execute(
  array(':res_id' => $_POST['resID'],
         ': res_date' => $_POST['dinfo'],
         ':res_name' => $_POST['roomnum'],
         ':res_email' => $_POST['resname'],
         ':res_tel' => $_POST['email'],
         ':res_phone' => $_POST['phone'], 
        ':res_notes' => $_POST['notes'], 
        
//          ':id' => $_GET['resID']
        
         ));
  
  
	echo "<br>" . "Edit success";


if($res) {
	
	header("location: manReservations.php");
}
}
		
}
	else {
		
		 // if logged in as User do this...
		
header("location: login.php");
		
	}
}
else {
	
	// if no session logged in do this..
	
	header("location: login.php");
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
  <?php include "phpIncludes/header.php";?>
<body>
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Update</h2>
      
      	<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Reservation ID</label>
			    <div class="col-sm-10">
			      <input type="date" name="resID"  class="form-control" id="input1" value="<?php echo $r['res_id'] ?>" placeholder="Reservation ID" />
			    </div>
			</div>


			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Reservation Date</label>
			    <div class="col-sm-10">
			      <input type="date" name="resdate"  class="form-control" id="input1" value="<?php echo $r['res_date'] ?>" placeholder="Reservation Date" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Reservation Status</label>
			    <div class="col-sm-10">
			      <input type="text" name="resslot"  class="form-control" id="input1" value="<?php echo $r['res_slot'] ?>" placeholder="Reservation Status" />
			    </div>
			</div>
      
      
      		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Reservation name</label>
			    <div class="col-sm-10">
			      <input type="text" name="resname"  class="form-control" id="input1" value="<?php echo $r[' res_name '] ?>" placeholder="Reservation name" />
			    </div>
			</div>

      		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" value="<?php echo $r['res_email'] ?>" placeholder="E-Mail" />
			    </div>
			</div>

      
          		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="text" name="phone"  class="form-control" id="input1" value="<?php echo $r[' res_tel'] ?>" placeholder="phone" />
			    </div>
			</div>

       		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Notes</label>
			    <div class="col-sm-10">
			      <input type="text" name="notes"  class="form-control" id="input1" value="<?php echo $r[' res_notes'] ?>" placeholder="Notes" />
			    </div>
			</div>
      



			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />
		</form>
	</div>
</div>
</body>
  	

  <?php include "phpIncludes/footer.php";?>
</html>