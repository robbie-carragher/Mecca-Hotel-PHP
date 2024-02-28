


<?php
session_start();
try{
	  require_once("phpIncludes/config.php");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	$error = $e->getMessage();
}

// First we need to select the record we need to update using the id
  
$selsql = "SELECT * FROM guest WHERE guestID=?";
$selresult = $db->prepare($selsql);
$selres = $selresult->execute(array($_GET['id']));
$r = $selresult->fetch(PDO::FETCH_ASSOC);

// Second we actually update the record using that ID

if(isset($_POST) && !empty($_POST)) {

// $sql =  "UPDATE guest SET res_date=:res_date, res_slot=:res_slot, res_name=res_name
// , res_email=:res_email,res_tel=:res_tel,res_notes=:res_notes  WHERE id=:id";
  
  $sql ="UPDATE guest SET guestFname=?, guestLname=?,guestAddress=?, guestCity=?,guestContact=?
  ,guestEmail=?, guestPassword=?, guestAdmin=? WHERE guestID=?";
  
  

  

$result = $db->prepare($sql);
$res = $result->execute(
  
  array(
         ':guestID' => $_POST['guestID'],
         ':guestFname' => $_POST['fname'],
         ':guestLname' => $_POST['lname'],
         ':guestAddress' => $_POST['address'],
         ':guestContact' => $_POST['phone'],
         ':guestEmail' => $_POST['email'],
         ':guestPassword' => $_POST['password'],
         ':guestAdmin' => $_POST['admin']

         ));
}
echo "successfully edited";
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
			    <label for="input1" class="col-sm-2 control-label">GuestID</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input1" value="<?php echo $r['guestID'] ?>" placeholder="GuestID" />
			    </div>
			</div>
      
      
      
      
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input1" value="<?php echo $r['guestFname'] ?>" placeholder="First Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="lname"  class="form-control" id="input1" value="<?php echo $r['guestLname'] ?>" placeholder="Last Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <input type="email" name="address"  class="form-control" id="input1" value="<?php echo $r['guestAddress'] ?>" placeholder="Address" />
			    </div>
			</div>
      
      <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="email" name="address"  class="form-control" id="input1" value="<?php echo $r['guestContact'] ?>" placeholder="Phone" />
			    </div>
			</div>
      
      
      		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">City</label>
			    <div class="col-sm-10">
			      <input type="email" name="city"  class="form-control" id="input1" value="<?php echo $r['guestCity'] ?>" placeholder="City" />
			    </div>
			</div>

      		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">E-Mail</label>
			    <div class="col-sm-10">
			      <input type="email" name="email"  class="form-control" id="input1" value="<?php echo $r['guestEmail'] ?>" placeholder="E-Mail" />
			    </div>
			</div>

      
          		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="email" name="password"  class="form-control" id="input1" value="<?php echo $r['guestPassword'] ?>" placeholder="password" />
			    </div>
			</div>
      
      
   		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Admin</label>
			    <div class="col-sm-10">
			      <input type="text" name="admin"  class="form-control" id="input1" value="<?php echo $r['guestAdmin'] ?>" placeholder="Admin" />
			    </div>
			</div>
      


			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />
		</form>
	</div>
</div>
</body>
  <?php include "phpIncludes/footer.php";?>

</html>