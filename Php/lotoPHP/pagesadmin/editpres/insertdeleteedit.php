<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $nom = $_POST[ 'nom' ];
  if ( !empty( $nom ) ) {
    $sql = "INSERT INTO `equipe`( `nom`)
                                     VALUES ('$nom')";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <br>
        <br>
        <br>
<form action="" method="POST">
  <h5>Nom</h5>
  <input type="text" name="nom" placeholder="Nom">
  <br>
    <br>
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
<br>
<a class="myButton" href="../../indexAdmin.php?page=mainadmin">Revenir à la page</a>
    </div>
        </body>
</html>