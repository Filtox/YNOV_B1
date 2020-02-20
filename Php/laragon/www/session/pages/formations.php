<?php
include( "pagesadmin/editformations/db.php" );
?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<!-- <?= recupereBaseDonneesFormation() ?> --> 
<!--
<?php include "includes/data.php" ?>
<?= getMultipleArray($formations, "formation") ?>
-->
<table>
  <tr>
    <?php
    $sel = "SELECT * FROM `formations` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $diplome = $row[ 'diplome' ];
      $option = $row[ 'option' ];
      $annee = $row[ 'annee' ];
      $etablissement = $row[ 'etablissement' ];
      $lieu = $row[ 'lieu' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $diplome . "</td><td>" . $option . "</td><td>" . $annee . "</td><td>" . $etablissement . "</td><td>" . $lieu . "</td></tr>";
    }
    ?>
  </tr>
</table>
</body>
</html>