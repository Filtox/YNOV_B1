<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `experiences` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$poste = $selassoc[ 'poste' ];
$entreprise = $selassoc[ 'entreprise' ];
$lieu = $selassoc[ 'lieu' ];
$annee = $selassoc[ 'annee' ];
$mois = $selassoc[ 'mois' ];
$description = $selassoc[ 'description' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $upposte = $_POST[ 'upposte' ];
  $upentreprise = $_POST[ 'upentreprise' ];
  $uplieu = $_POST[ 'uplieu' ];
  $upannee = $_POST[ 'upannee' ];
  $upmois = $_POST[ 'upmois' ];
  $updescription = $_POST[ 'updescription' ];
  $seleditt = "UPDATE `experiences` SET `poste`='$upposte',`entreprise`='$upentreprise',`lieu`='$uplieu',`annee`='$upannee',`mois`='$upmois',`description`='$updescription' WHERE `id` = '$upid'";
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
  <p>Intitulé du poste</p>
  <input type="text" name="upposte" value="<?php echo $poste; ?>">
  <br>
  <br>
  <p>Entreprise</p>
  <input type="text" name="upentreprise" value="<?php echo $entreprise; ?>">
  <br>
  <br>
  <p>Lieu</p>
  <input type="text" name="uplieu" value="<?php echo $lieu; ?>">
  <br>
  <br>
  <p>Année</p>
  <input type="text" name="upannee" value="<?php echo $annee; ?>">
  <br>
  <br>
  <p>Mois</p>
  <input type="text" name="upmois" value="<?php echo $mois; ?>">
  <br>
  <br>
  <p>Description</p>
  <input type="text" name="description" value="<?php echo $description; ?>">
  <br>
  <br>
  <input type="submit" name="updateedit" value="Modifier">
</form>
</body>
</html>