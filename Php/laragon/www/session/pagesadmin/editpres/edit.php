<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `presentation` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$firstname = $selassoc[ 'firstname' ];
$lastname = $selassoc[ 'lastname' ];
$age = $selassoc[ 'age' ];
$adresse = $selassoc[ 'adresse' ];
$ville = $selassoc[ 'ville' ];
$mail = $selassoc[ 'mail' ];
$phone = $selassoc[ 'phone' ];
$permis = $selassoc[ 'permis' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $upfirstname = $_POST[ 'upfirstname' ];
  $uplastname = $_POST[ 'uplastname' ];
  $upage = $_POST[ 'upage' ];
  $upadresse = $_POST[ 'upadresse' ];
  $upville = $_POST[ 'upville' ];
  $upmail = $_POST[ 'upmail' ];
  $upphone = $_POST[ 'upphone' ];
  $uppermis = $_POST[ 'uppermis' ];
  $seleditt = "UPDATE `presentation` SET `firstname`='$upfirstname',`lastname`='$uplastname',`age`='$upage',`adresse`='$upadresse',`ville`='$upville',`mail`='$upmail',`phone`='$upphone',`permis`='$uppermis' WHERE `id` = '$upid'";
  $qry = mysqli_query( $connect, $seleditt );
  if ( $qry ) {
    header( "location: display.php" );
  }
}
//$seledit = "UPDATE `presentation` SET `id`=[value-1],`firstname`=[value-2],`lastname`=[value-3],`email`=[value-4] WHERE `id` = '$getid'";
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<form method="POST" action="">
  <input type="text" name="upid" value="<?php echo $id; ?>">
  <br>
  <br>
  <input type="text" name="upfirstname" value="<?php echo $firstname; ?>">
  <br>
  <br>
  <input type="text" name="uplastname" value="<?php echo $lastname; ?>">
  <br>
  <br>
  <input type="text" name="upage" value="<?php echo $age; ?>">
  <br>
  <br>
  <input type="text" name="upadresse" value="<?php echo $adresse; ?>">
  <br>
  <br>
  <input type="text" name="upville" value="<?php echo $ville; ?>">
  <br>
  <br>
  <input type="text" name="upmail" value="<?php echo $mail; ?>">
  <br>
  <br>
  <input type="text" name="upphone" value="<?php echo $phone; ?>">
  <br>
  <br>
  <input type="text" name="uppermis" value="<?php echo $permis; ?>">
  <br>
  <br>
  <input type="submit" name="updateedit" value="Update">
</form>
</body>
</html>