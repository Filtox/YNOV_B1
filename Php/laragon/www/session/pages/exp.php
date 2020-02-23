<?php
include( "pagesadmin/editexp/db.php" );
?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
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
<!-- <?= recupereBaseDonneesExperiences() ?> -->
<!--
<?php include "includes/data.php" ?>
<?= getMultipleArray($exp_pro, "exp") ?>
-->
    <table>
  <tr>
    <?php
    $sel = "SELECT * FROM `experiences` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $poste = $row[ 'poste' ];
      $entreprise = $row[ 'entreprise' ];
      $lieu = $row[ 'lieu' ];
      $annee = $row[ 'annee' ];
      $mois = $row[ 'mois' ];
      $description = $row[ 'description' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $poste . "</td><td>" . $entreprise . "</td><td>" . $lieu . "</td><td>" . $annee . "</td><td>" . $mois . "</td><td>" . $description . "</td></tr>";
    }
    ?>
  </tr>
</table>
</body>
</html>