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
    <table>
  <tr>
    <?php
    $sel = "SELECT * FROM `matchs` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $eq1 = $row[ 'eq1' ];
      $eq2 = $row[ 'eq2' ];
      $dateMatch = $row[ 'dateMatch' ];
      $resultat = $row[ 'resultat' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $eq1 . "</td><td>" . $eq2 . "</td><td>" . $dateMatch . "</td><td>" . $resultat . "</td></tr>";
    }
    ?>
  </tr>
</table>
</body>
</html>