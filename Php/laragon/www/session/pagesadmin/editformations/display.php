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
    $sel = "SELECT * FROM `formations` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $diplome = $row[ 'diplome' ];
      $option = $row[ 'option' ];
      $annee = $row[ 'annee' ];
      $etablissement = $row[ 'etablissement' ];
      $lieu = $row[ 'lieu' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $diplome . "</td><td>" . $option . "</td><td>" . $annee . "</td><td>" . $etablissement . "</td><td>" . $lieu . "</td><td><a href='../pagesadmin/editformations/edit.php?edit=$id' >Modifier</a></td><td><a style='color: red'  href='../pagesadmin/editformations/delete.php?deleteid=$id' >Supprimer</a></td></tr>";
    }
    ?>
  </tr>
</table>
<br>
<a class="myButton"  href="../../indexAdmin.php?page=formationsadmin">Rafraichir</a>
<br>
</body>
</html>