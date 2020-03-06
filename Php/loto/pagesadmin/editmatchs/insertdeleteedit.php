<?php
include( "db.php" );
if ( isset( $_POST[ 'submitinserdetails' ] ) ) {
  $eq1 = $_POST[ 'eq1' ];
  $eq2 = $_POST[ 'eq2' ];
  $dateMatch = $_POST[ 'dateMatch' ];
  $resultat = $_POST[ 'resultat' ];
  if ( !empty( $eq1 ) && !empty( $eq2 ) && !empty( $dateMatch ) && empty( $resultat ) || !empty( $resultat ) ) {
    $sql = "INSERT INTO `matchs`( `eq1`, `eq2`, `dateMatch`, `resultat`)
                                     VALUES ('$eq1','$eq2','$dateMatch','$resultat')";
    $qry = mysqli_query( $connect, $sql );
    if ( $qry ) {
      echo "<br>inserted successfully";
    }
  } else {
    echo "<br>All fields must be filled";
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
<title>Ajouter données</title>
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container text-center"> <br>
  <br>
  <br>
  <form action="" method="POST">
    <h5>Equipe 1</h5>
    <select name="eq1" size="1">
      <?php while($row1 = mysqli_fetch_array($result1)):;?>
      <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
      <?php endwhile;?>
    </select>
    <br >
    <br >
    <h5>Equipe 2</h5>
    <select name="eq2" size="1">
      <?php while($row1 = mysqli_fetch_array($result2)):;?>
      <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
      <?php endwhile;?>
    </select>
    <br >
    <br >
    <h5>Date du match</h5>
    <input type="date" name="dateMatch" placeholder="2020-01-30">
    <br >
    <br >
    <h5>Résultat</h5>
    <SELECT name="resultat" size="4">
      <OPTION value="1">Equipe 1</option>
      <OPTION value="2">Equipe 2</option>
      <OPTION value="N">Nul</option>
      <OPTION value="Résultat à venir">Résultat à venir</option>
    </select>
    <br >
    <br >
    <input type="submit" name="submitinserdetails" value="Insérer">
  </form>
  <br>
  <a class="myButton" href="../../indexAdmin.php?page=matchsadmin">Revenir à la page</a> </div>
</body>
</html>