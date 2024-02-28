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
	
	
	
// 	$sql = "SELECT * FROM Customer_Accounts";
// $result = $db->query($sql);

	
}

else {
	
	 // if logged in as User do this...
	
	header("location: reservations.php");

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
  <meta charset="utf-8">
  <title></title>
</head>
  <?php include "phpIncludes/header.php";?>
<body>
    <?php include "phpIncludes/hero-reserve.php";?>
</body>
  <?php include "phpIncludes/footer.php";?>
</html>