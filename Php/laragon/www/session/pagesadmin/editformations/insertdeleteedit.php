<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $diplome = $_POST[ 'diplome' ];
  $option = $_POST[ 'option' ];
  $annee = $_POST[ 'annee' ];
  $etablissement = $_POST[ 'etablissement' ];
  $lieu = $_POST[ 'lieu' ];
  if ( !empty( $diplome ) && !empty( $option ) && !empty( $annee ) && !empty( $etablissement ) && !empty( $lieu ) ) {
    $sql = "INSERT INTO `formations`( `diplome`, `option`, `annee`, `etablissement`, `lieu`)
                                     VALUES ('$diplome','$option','$annee','$etablissement','$lieu')";
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
<title>Ajouter données</title>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
<form action="" method="POST">
  <p>Diplome</p>
  <input type="text" name="diplome" placeholder="Diplome">
  <br >
  <br >
  <p>Option</p>
  <input type="text" name="option" placeholder="Option">
  <br >
  <br >
  <p>Année</p>
  <input type="text" name="annee" placeholder="Annee">
  <br >
  <br >
  <p>Etablissement</p>
  <input type="text" name="etablissement" placeholder="Etablissement">
  <br >
  <br >
  <p>Lieu</p>
  <input type="text" name="lieu" placeholder="Lieu">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
<br>
<a class="myButton" href="../../indexAdmin.php?page=formationsadmin">Revenir à la page</a>
</body>
</html>