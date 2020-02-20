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
      echo "<tr><td>" . $id . "</td><td>" . $poste . "</td><td>" . $entreprise . "</td><td>" . $lieu . "</td><td>" . $annee . "</td><td>" . $mois . "</td><td>" . $description . "</td><td><a href='../pagesadmin/editexp/edit.php?edit=$id' >Modifier</a></td><td><a href='../pagesadmin/editexp/delete.php?deleteid=$id' >Supprimer</a></td></tr>";
    }
    ?>
  </tr>
</table>
<br>
<button>
<a href="../../indexAdmin.php?page=expadmin">Rafraichir</a>
</button>
<br>
</body>
</html>