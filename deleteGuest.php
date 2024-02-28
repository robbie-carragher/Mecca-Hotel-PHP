<?php


try{
    require_once("phpIncludes/config.php");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
  $error = $e->getMessage();
}

$DelSql = "DELETE FROM guest WHERE guestID=?";
$result = $db->prepare($DelSql);
$res = $result->execute(array($_GET['id']));

if($res){
  header('location: index.php');
}

?>