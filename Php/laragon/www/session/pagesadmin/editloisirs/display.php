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
    $sel = "SELECT * FROM `loisirs` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $loisirs = $row[ 'loisirs' ];
      echo "<tr><td>" . $id . "</td><td>" . $loisirs . "</td><td><a href='../pagesadmin/editloisirs/edit.php?edit=$id' >Modifier</a></td><td><a href='../pagesadmin/editloisirs/delete.php?deleteid=$id' >Supprimer</a></td></tr>";
    }
    ?>
  </tr>
</table>
<br>
<button>
<a href="../../indexAdmin.php?page=loisirsadmin">Rafraichir</a>
</button>
<br>
</body>
</html>