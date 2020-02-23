<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `loisirs` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$loisirs = $selassoc[ 'loisirs' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $uploisirs = $_POST[ 'uploisirs' ];
  $seleditt = "UPDATE `loisirs` SET `loisirs`='$uploisirs' WHERE `id` = '$upid'";
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
  <p>Loisirs</p>
  <input type="text" name="uploisirs" value="<?php echo $loisirs; ?>">
  <br>
  <br>
  <input type="submit" name="updateedit" value="Modifier">
</form>
</body>
</html>