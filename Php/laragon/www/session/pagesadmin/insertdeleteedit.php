<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $prenom = $_POST[ 'prenom' ];
  $nom = $_POST[ 'nom' ];
  $age = $_POST[ 'age' ];
  $adresse = $_POST[ 'adresse' ];
  $ville = $_POST[ 'ville' ];
  $email = $_POST[ 'email' ];
  $phone = $_POST[ 'phone' ];
  $permis = $_POST[ 'permis' ];
  if ( !empty( $prenom ) && !empty( $nom ) && !empty( $age ) && !empty( $adresse ) && !empty( $ville ) && !empty( $email ) && !empty( $phone ) && !empty( $permis ) ) {
    $sql = "INSERT INTO `insertdeleteedittable`( `prenom`, `nom`, `age`, `adresse`, `ville`, `email`, `phone`, `permis`)
                                     VALUES ('$prenom','$nom','$age','$adresse','$ville','$email','$phone','$permis')";
    $qry = mysqli_query( $connect, $sql );
    if ( $qry ) {
      echo "inserted successfully";
    }
  } else {
    echo "all fields must be filled";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<form action="" method="POST">
  <input type="text" name="prenom" placeholder="Prénom">
  <br >
  <br >
  <input type="text" name="nom" placeholder="Nom">
  <br >
  <br >
  <input type="text" name="age" placeholder="Age">
  <br >
  <br >
	<input type="text" name="adresse" placeholder="Adresse">
  <br >
  <br >
	<input type="text" name="ville" placeholder="Ville">
  <br >
  <br >
	<input type="text" name="email" placeholder="E-mail">
  <br >
  <br >
	<input type="text" name="phone" placeholder="Téléphone">
  <br >
  <br >
	<input type="text" name="permis" placeholder="Permis">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="insert">
</form>
</body>
</html>