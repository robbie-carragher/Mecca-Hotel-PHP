<?php


try{
  require_once("phpIncludes/config.php");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
  $error = $e->getMessage();
}

$DelSql = "DELETE FROM reservations WHERE res_id=?";
$result = $db->prepare($DelSql);
$res = $result->execute(array($_GET['res_id']));

if($res){
  header('location: manReservations.php');
}

?>