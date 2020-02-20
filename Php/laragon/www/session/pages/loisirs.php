<?php
include( "pagesadmin/editloisirs/db.php" );
?>
<?php include 'includes/data.php' ?>
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
<!-- <?=	recupereBaseDonneesLoisirs() ?> -->
<!--
	<ul>
  <?php foreach($loisirs as $l): ?>
  <li> <span class="loisirs_label">
    <?= $l ?>
    </span> </li>
  <?php endforeach ?>
</ul>
-->
    <table>
  <tr>
    <?php
    $sel = "SELECT * FROM `loisirs` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $loisirs = $row[ 'loisirs' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $loisirs . "</td></tr>";
    }
    ?>
  </tr>
</table>
</body>
</html>