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
  if ( !empty( $firstname ) && !empty( $lastname ) && !empty( $age ) ) {
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
</head>
<body>
<form action="" method="POST">
  <input type="text" name="firstname" placeholder="Prénom">
  <br >
  <br >
  <input type="text" name="lastname" placeholder="Nom">
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
  <input type="text" name="mail" placeholder="Mail">
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