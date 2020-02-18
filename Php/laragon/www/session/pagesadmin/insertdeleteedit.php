<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $firstname = $_POST[ 'firstname' ];
  $lastname = $_POST[ 'lastname' ];
  $email = $_POST[ 'email' ];
  if ( !empty( $firstname ) && !empty( $lastname ) && !empty( $email ) ) {
    $sql = "INSERT INTO `insertdeleteedittable`( `firstname`, `lastname`, `email`)
                                     VALUES ('$firstname','$lastname','$email')";
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