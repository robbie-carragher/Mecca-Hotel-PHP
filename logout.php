<?php
session_start();

if 
  ($_SESSION){


session_destroy();
header("location: index.php");

} else{
  
  header("location: login.php");
}

?>

