<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $firstname = $_POST[ 'firstname' ];
  $lastname = $_POST[ 'lastname' ];
  $age = $_POST[ 'age' ];
  $adresse = $_POST[ 'adresse' ];
  $ville = $_POST[ 'ville' ];
  $mail = $_POST[ 'mail' ];
  $phone = $_POST[ 'phone' ];
  $permis = $_POST[ 'permis' ];
  if ( !empty( $firstname ) && !empty( $lastname ) && !empty( $age ) && !empty( $adresse ) && !empty( $ville ) && !empty( $mail ) && !empty( $phone ) && !empty( $permis ) ) {
    $sql = "INSERT INTO `presentation`( `firstname`, `lastname`, `age`, `adresse`, `ville`, `mail`, `phone`, `permis`)
                                     VALUES ('$firstname','$lastname','$age','$adresse','$ville','$mail','$phone','$permis')";
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
    <p>Prénom</p>
  <input type="text" name="firstname" placeholder="Prénom">
  <br >
  <br >
    <p>Nom</p>
  <input type="text" name="lastname" placeholder="Nom">
  <br >
  <br >
    <p>Age</p>
  <input type="text" name="age" placeholder="Age">
	<br >
  <br >
    <p>Adresse</p>
  <input type="text" name="adresse" placeholder="Adresse">
	<br >
  <br >
    <p>Ville</p>
  <input type="text" name="ville" placeholder="Ville">
	<br >
  <br >
    <p>Mail</p>
  <input type="text" name="mail" placeholder="Mail">
	<br >
  <br >
    <p>Téléphone</p>
  <input type="text" name="phone" placeholder="Téléphone">
	<br >
  <br >
    <p>Permis</p>
  <input type="text" name="permis" placeholder="Permis">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
    <br>
    <a class="myButton" href="../../indexAdmin.php?page=mainadmin">Revenir à la page</a>
</body>
</html>