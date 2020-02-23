<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `formations` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$diplome = $selassoc[ 'diplome' ];
$otpion = $selassoc[ 'option' ];
$annee = $selassoc[ 'annee' ];
$etablissement = $selassoc[ 'etablissement' ];
$lieu = $selassoc[ 'lieu' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $updiplome = $_POST[ 'updiplome' ];
  $upoption = $_POST[ 'upoption' ];
  $upannee = $_POST[ 'upannee' ];
  $upetablissement = $_POST[ 'upetablissement' ];
  $uplieu = $_POST[ 'uplieu' ];
  $seleditt = "UPDATE `formations` SET `diplome`='$updiplome',`option`='$upoption',`annee`='$upannee',`etablissement`='$upetablissement',`lieu`='$uplieu' WHERE `id` = '$upid'";
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
  <input type="text" name="updiplome" value="<?php echo $diplome; ?>">
  <br>
  <br>
  <input type="text" name="upoption" value="<?php echo $upoption; ?>">
	<br>
  <br>
  <input type="text" name="upannee" value="<?php echo $annee; ?>">
	<br>
  <br>
  <input type="text" name="upetablissement" value="<?php echo $etablissement; ?>">
	<br>
  <br>
  <input type="text" name="lieu" value="<?php echo $lieu; ?>">
	<br>
  <br>
<input type="submit" name="updateedit" value="Update">
</form>
</body>
</html>