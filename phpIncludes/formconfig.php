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
