<?php
include( "db.php" );
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<style type="text/css">
table {
    border: 1px solid black;
    border-collapse: collapse;
}
td {
    border: 1px solid black;
    padding: 10px;
}
</style>
</head>
<body>
<table>
  <tr>
    <?php
    $sel = "SELECT * FROM `insertdeleteedittable` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $prenom = $row[ 'prenom' ];
      $nom = $row[ 'nom' ];
      $age = $row[ 'age' ];
      $adresse = $row[ 'adresse' ];
      $ville = $row[ 'ville' ];
      $email = $row[ 'email' ];
      $phone = $row[ 'phone' ];
      $permis = $row[ 'permis' ];
      echo "<tr><td>" . $id . "</td><td>" . $prenom . "</td><td>" . $nom . "</td><td>" . $age . "</td><td>" . $adresse . "</td><td>" . $ville . "</td><td>" . $email . "</td><td>" . $phone . "</td><td>" . $permis . "</td><td><a href='edit.php?edit=$id' >Edit</a></td><td><a href='delete.php?deleteid=$id' >Delete</a></td></tr>";
    }
    ?>
  </tr>
</table>
</body>
</html>