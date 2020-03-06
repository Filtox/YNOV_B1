<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `equipe` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$nom = $selassoc[ 'nom' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $upnom = $_POST[ 'upnom' ];
  $seleditt = "UPDATE `equipe` SET `nom`='$upnom' WHERE `id` = '$upid'";
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
<title>Edition données</title>
</head>
<body>
<form method="POST" action="../../indexAdmin.php?page=mainadmin">
  <p>Nom</p>
  <input type="text" name="upnom" value="<?php echo $nom; ?>">
  <br>
  <br>
  <input type="submit" name="updateedit" value="Modifier">
</form>
</body>
</html>