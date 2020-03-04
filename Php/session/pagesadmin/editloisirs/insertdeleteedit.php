<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $loisirs = $_POST[ 'loisirs' ];
  if ( !empty( $loisirs ) ) {
    $sql = "INSERT INTO `loisirs`( `loisirs`)
                                     VALUES ('$loisirs')";
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
    <p>Loisirs</p>
  <input type="text" name="loisirs" placeholder="Loisirs">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
    <br>
<a class="myButton" href="../../indexAdmin.php?page=loisirsadmin">Revenir à la page</a>
</body>
</html>