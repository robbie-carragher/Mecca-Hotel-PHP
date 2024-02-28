<?php
session_start();
try {
  require_once("phpIncludes/config.php");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e) {
	$error = $e->getMessage();
}

if(isset($_POST) && !empty($_POST)) {
	
$sql = "INSERT INTO guest( guestFname, guestLname, guestAddress, guestCity, guestContact, guestEmail, guestPassword) 
VALUE(:guestFname, :guestLname, :guestAddress, :guestCity, :guestContact, :guestEmail, :guestPassword)";
// $sql2 = "INSERT INTO userLogin (user_email, user_password) VALUES (:email, :password)";


$result = $db->prepare($sql);
$res = $result->execute(
array(':guestFname' => $_POST['fname'],
			':guestLname' => $_POST['lname'],
			':guestAddress' => $_POST['address'],
			':guestCity' => $_POST['city'],
			':guestContact' => $_POST['phone'],
      ':guestEmail' => $_POST['email'],
      ':guestPassword' => $_POST['password']

			));
	
// $result2 = $db->prepare($sql2);
// $res2 = $result2->execute(
// array(':email' => $_POST['email'],
// 		  ':password' => $_POST['password']
// 		 ));

	if($res) {
		echo "<script type='text/javascript'>
alert('Please try logging in again. ');
window.location.href='register.php';
</script>";
	}
	else {
		echo "<br>" . "Failed to create entry";
	}
}

?>


<!DOCTYPE HTML>

<head>
	<title>Register</title>
	<
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
  <?php include "phpIncludes/header.php";?>
<body
        <?php include "phpIncludes/hero.php";?>
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Create User Account</h2>
			<br>
			<br>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">First Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="fname"  class="form-control" id="input1" placeholder="First Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Last Name</label>
			    <div class="col-sm-10">
			      <input type="text" name="lname"  class="form-control" id="input1" placeholder="Last Name" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <input type="text" name="address"  class="form-control" id="input1" placeholder="Address" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">City</label>
			    <div class="col-sm-10">
			      <input type="text" name="city"  class="form-control" id="input1" placeholder="City" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Phone</label>
			    <div class="col-sm-10">
			      <input type="text" name="phone"  class="form-control" id="input1" placeholder="xxx-xxx-xxxx" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="text" name="email"  class="form-control" id="input1" placeholder="email" />
			    </div>
			</div>
			
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="password"  class="form-control" id="input1" placeholder="create password" />
			    </div>
			</div>
			
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
	</div>
</div>
<?php include "phpIncludes/footer.php";?>
</HTML>