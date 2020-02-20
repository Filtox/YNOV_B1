<?php
include( "db.php" );
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
     <link rel="stylesheet" href="../../assets/css/style.css">
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
    $sel = "SELECT * FROM `presentation` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $firstname = $row[ 'firstname' ];
      $lastname = $row[ 'lastname' ];
      $age = $row[ 'age' ];
      $adresse = $row[ 'adresse' ];
      $ville = $row[ 'ville' ];
      $mail = $row[ 'mail' ];
      $phone = $row[ 'phone' ];
      $permis = $row[ 'permis' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $firstname . "</td><td>" . $lastname . "</td><td>" . $age . "</td><td>" . $adresse . "</td><td>" . $ville . "</td><td>" . $mail . "</td><td>" . $phone . "</td><td>" . $permis . "</td><td><a href='../pagesadmin/editpres/edit.php?edit=$id' >Modifier</a></td><td><a style='color: red' href='../pagesadmin/editpres/delete.php?deleteid=$id' >Supprimer</a></td></tr>";
    }
    ?>
  </tr>
</table>
    <br>
    <a  class="myButton" href="../../indexAdmin.php?page=mainadmin">Rafraichir</a><br>
</body>
</html>