<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `matchs` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$eq1 = $selassoc[ 'eq1' ];
$eq2 = $selassoc[ 'eq2' ];
$dateMatch = $selassoc[ 'dateMatch' ];
$resultat = $selassoc[ 'resultat' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $upeq1 = $_POST[ 'upeq1' ];
  $upeq2 = $_POST[ 'upeq2' ];
  $updateMatch = $_POST[ 'updateMatch' ];
  $upresultat = $_POST[ 'upresultat' ];
  $seleditt = "UPDATE `matchs` SET `eq1`='$upeq1',`eq2`='$upeq2',`dateMatch`='$updateMatch',`resultat`='$upresultat' WHERE `id` = '$upid'";
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
<title>Edition Matchs</title>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<form method="POST" action="../../indexAdmin.php?page=matchsadmin">
  <p>Equipe 1 (Int)</p>
  <input type="text" name="upeq1" value="<?php echo $eq1; ?>">
  <br>
  <br>
  <p>Equipe 2 (Int)</p>
  <input type="text" name="upeq2" value="<?php echo $eq2; ?>">
  <br>
  <br>
  <p>Date du match (YYYY-MM-JJ)</p>
  <input type="text" name="updateMatch" value="<?php echo $dateMatch; ?>">
  <br>
  <br>
  <p>Résultat (1 ou 2 ou N)</p>
  <input type="text" name="upresultat" value="<?php echo $resultat; ?>">
  <br>
  <br>
  <input type="submit" name="updateedit" value="Modifier">
</form>
</body>
</html>