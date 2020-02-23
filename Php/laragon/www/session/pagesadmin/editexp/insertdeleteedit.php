<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $poste = $_POST[ 'poste' ];
  $entreprise = $_POST[ 'entreprise' ];
  $lieu = $_POST[ 'lieu' ];
  $annee = $_POST[ 'annee' ];
  $mois = $_POST[ 'mois' ];
  $description = $_POST[ 'description' ];
  if ( !empty( $poste ) && !empty( $entreprise ) && !empty( $lieu ) && !empty( $annee ) && !empty( $mois ) && !empty( $description ) ) {
    $sql = "INSERT INTO `experiences`( `poste`, `entreprise`, `lieu`, `annee`, `mois`, `description`)
                                     VALUES ('$poste','$entreprise','$lieu','$annee','$mois','$description')";
    $qry = mysqli_query( $connect, $sql );
    if ( $qry ) {
      echo "<br>inserted successfully";
    }
  } else {
    echo "<br>All fields must be filled";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<form action="" method="POST">
  <input type="text" name="poste" placeholder="Poste">
  <br >
  <br >
  <input type="text" name="entreprise" placeholder="Entreprise">
  <br >
  <br >
  <input type="text" name="lieu" placeholder="Lieu">
	<br >
  <br >
  <input type="text" name="annee" placeholder="Annee">
	<br >
  <br >
  <input type="text" name="mois" placeholder="Mois">
	<br >
  <br >
  <input type="text" name="description" placeholder="Description">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
    <br>
    <a class="myButton" href="../../indexAdmin.php?page=expadmin">Revenir à la page</a>
</body>
</html>