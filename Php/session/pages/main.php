<?php
include( "pagesadmin/editpres/db.php" );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
<!--    <?= recupereBaseDonneesPresentation() ?> -->
    
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
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $firstname . "</td><td>" . $lastname . "</td><td>" . $age . "</td><td>" . $adresse . "</td><td>" . $ville . "</td><td>" . $mail . "</td><td>" . $phone . "</td><td>" . $permis . "</td></tr>";
    }
    ?>
  </tr>
</table>
    <br><br><img style="width: 30%; height: auto;" alt="profil" src="../images/actual/profil.jpg"><br><br>
</body>
</html>