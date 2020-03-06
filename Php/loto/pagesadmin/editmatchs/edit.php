<?php
include( "db.php" );
$getid = $_GET[ 'edit' ];
$seledittwo = "SELECT * FROM `matchs` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $seledittwo );
$selassoc = mysqli_fetch_assoc( $qry );
$id = $selassoc[ 'id' ];
$eq1 = $selassoc[ 'eq1' ];
$eq2 = $selassoc[ 'eq2' ];
$dateMatch = $selassoc[ 'dateMatch' ];
$resultat = $selassoc[ 'resultat' ];
if ( isset( $_POST[ 'updateedit' ] ) ) {
  $upid = $_POST[ 'upid' ];
  $upeq1 = $_POST[ 'upeq1' ];
  $upeq2 = $_POST[ 'upeq2' ];
  $updateMatch = $_POST[ 'updateMatch' ];
  $upresultat = $_POST[ 'upresultat' ];
  $seleditt = "UPDATE `matchs` SET `eq1`='$upeq1',`eq2`='$upeq2',`dateMatch`='$updateMatch',`resultat`='$upresultat' WHERE `id` = '$upid'";
  $qry = mysqli_query( $connect, $seleditt );
  if ( $qry ) {
    header( "location: display.php" );
  }
}

$query = "SELECT * FROM `equipe`";
$result1 = mysqli_query( $connect, $query );

$query2 = "SELECT * FROM `equipe`";
$result2 = mysqli_query( $connect, $query2 );
?>
<!DOCTYPE html>
<html>
<head>
<title>Edition Matchs</title>
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container text-center"> <br>
  <br>
  <br>
  <form method="POST" action="../../indexAdmin.php?page=matchsadmin">
    <h5>Equipe 1</h5>
    <select name="eq1" size="1">
      <?php while($row1 = mysqli_fetch_array($result1)):;?>
      <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
      <?php endwhile;?>
    </select>
    <br>
    <br>
    <h5>Equipe 2</h5>
    <select name="eq2" size="1">
      <?php while($row1 = mysqli_fetch_array($result2)):;?>
      <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
      <?php endwhile;?>
    </select>
    <br>
    <br>
    <h5>Date du match</h5>
    <input type="date" name="updateMatch" value="<?php echo $dateMatch; ?>">
    <br>
    <br>
    <h5>Résultat</h5>
    <SELECT name="resultat" size="4">
      <OPTION value="1">Equipe 1</option>
      <OPTION value="2">Equipe 2</option>
      <OPTION value="N">Nul</option>
      <OPTION value="Résultat à venir">Résultat à venir</option>
    </select>
    <br>
    <br>
    <input type="submit" name="updateedit" value="Modifier">
  </form>
</div>
</body>
</html>