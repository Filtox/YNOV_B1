<?php
include( "db.php" );
?>
<!DOCTYPE html>
<html>
<head>
<title>Ecran de modification</title>
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
    $sel = "SELECT * FROM `equipe` ";
    $qrydisplay = mysqli_query( $connect, $sel );
    while ( $row = mysqli_fetch_array( $qrydisplay ) ) {
      $id = $row[ 'id' ];
      $nom = $row[ 'nom' ];
      echo "<tr><td style='color : red; background: lightblue;'>" . $id . "</td><td>" . $nom . "</td><td><a href='../loto/pagesadmin/editpres/edit.php?edit=$id' >Modifier</a></td><td><a style='color: red' href='../loto/pagesadmin/editpres/delete.php?deleteid=$id' >Supprimer</a></td></tr>";
    }
    ?>
  </tr>
</table>
    <br>
    <!--<a  class="myButton" href="../../indexAdmin.php?page=mainadmin">Rafraichir</a><br>-->
</body>
</html>