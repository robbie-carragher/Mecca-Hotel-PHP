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
	
	// if already logged in, log out and stay on home page
	
// 	session_destroy();
// 	header("location: index.php");
	
}

else {

	// load login page and create session
	
 // to display error messages on form
	
if(isset($_POST) && !empty($_POST)) {
	
	
	try{
		
		// verify login credentials
		
$sql = "SELECT * FROM guest WHERE guestEmail=:user_email AND guestPassword=:user_password";  
		
	$user_name = $_POST['user'];				// $user_name = user name entered in form
	$user_password = $_POST['pass'];		// $user_password = user password entered in form
		
		// query User_Login table for user credentials entered in form
		
	$result = $db->prepare($sql);
	$result->bindParam(':user_email', $user_name, PDO::PARAM_STR);
	$result->bindParam(':user_password', $user_password, PDO::PARAM_STR);
	$result->execute();
	$count = $result->rowCount();
	$row = $result->fetch(PDO::FETCH_ASSOC);  // fetch values from User_Login table

	if ($count && !empty($row)) {
		
		// if valid login, start session
		
		$user_name = $row['guestEmail'];						// $user_name = User_Login.user_email
		$user_password = $row['guestPassword'];			// $user_password = User_Login.user_password
		$user_status = $row['guestAdmin'];						// $user_status = User_Login.is_admin
		
		// set session variables
		
		$_SESSION['session_name'] = $user_name;					
		$_SESSION['session_password'] = $user_password;
		$_SESSION['session_status'] = $user_status;
		

		// redirect to home page
		
		header("location: reservations.php");
	}
	else {
		
		// display error message on form
		
		$msg = "Invalid user credentials. Please try again, or create account";
		
	}


}
	catch (PDOException $e) {
      echo "Error : ".$e->getMEssage();
    }
}
}
?>


<!DOCTYPE HTML>
<html>
	
<head>
	<title>User Account | Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>

  <?php include "phpIncludes/header.php";?>

<body>
    <?php include "phpIncludes/hero.php";?>
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Log into User Account</h2>
			<br>
			<br>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">User Name</label>
			    <div class="col-sm-10">
			      <input type="email" name="user"  class="form-control" id="input1" placeholder="Email" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="pass"  class="form-control" id="input1" placeholder="Password" />
			    </div>
			</div>
			
			<p>

		</p>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="submit" />
		</form>
		

		
		
		
	</div>
</div>
	</body>

  <?php include "phpIncludes/footer.php";?>
	
</html>
