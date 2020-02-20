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
<title>Edition </title>
</head>
<body>
<form action="" method="POST">
  <input type="text" name="loisirs" placeholder="Loisirs">
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="insert">
</form>
    <br>
    <button><a href="../../indexAdmin.php?page=loisirsadmin">Revenir à la page</a></button>
</body>
</html>