


<?php
try{
  require_once("phpIncludes/config.php");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	$error = $e->getMessage();
}

// First we need to select the record we need to update using the id
  
$selsql = "SELECT * FROM room WHERE roomID=?";
$selresult = $db->prepare($selsql);
$selres = $selresult->execute(array($_GET['id']));
$r = $selresult->fetch(PDO::FETCH_ASSOC);

// Second we actually update the record using that ID

if(isset($_POST) && !empty($_POST)) {

$sql =  "UPDATE guest SET regInfo=,:regInfo, DluxInfo=,:DluxInfo, roomNumber=,:roomNumber   WHERE id=:id";
  


$result = $db->prepare($sql);
$res = $result->execute(
  array(':regInfo' => $_POST['rinfo'],
         ':DluxInfo' => $_POST['dinfo'],
         ':roomNumber' => $_POST['roomnum'],
     
        
         ':id' => $_GET['id']
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
			    <label for="input1" class="col-sm-2 control-label">Regular Room Info</label>
			    <div class="col-sm-10">
			      <input type="text" name="rinfo"  class="form-control" id="input1" value="<?php echo $r['regInfo'] ?>" placeholder="Regular Room Info" />
			    </div>
			</div>

			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">>Deluxe Room Info</label>
			    <div class="col-sm-10">
			      <input type="email" name="dinfo"  class="form-control" id="input1" value="<?php echo $r['DluxID'] ?>" placeholder="Deluxe Room Info" />
			    </div>
			</div>
      
      
      		<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Room Number</label>
			    <div class="col-sm-10">
			      <input type="number" name="roomnum"  class="form-control" id="input1" value="<?php echo $r['roomNumber'] ?>" placeholder="Room number" />
			    </div>
			</div>


 		
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Update" />
		</form>
	</div>
</div>
  	
	  <?php include "phpIncludes/footer.php";?>
</body>
</html>