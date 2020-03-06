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
?>
<!DOCTYPE html>
<html>
<head>
<title>Ajouter données</title>
<link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <br>
        <br>
        <br>
<form action="" method="POST">
  <h5>Equipe 1 (Int)</h5>
  <SELECT name="eq1" size="1">
    <OPTION value="1">Toulouse</option>
    <OPTION value="2">Clermont</option>
    <OPTION value="4">Agen</option>
    <OPTION value="5">Castres</option>
    <OPTION value="6">Lyon</option>
    <OPTION value="7">Bordeaux</option>
    <OPTION value="8">Racing 92</option>
    <OPTION value="9">Toulon</option>
    <OPTION value="10">La Rochelle</option>
    <OPTION value="11">Montpellier</option>
    <OPTION value="12">Bayonne</option>
    <OPTION value="13">Brive</option>
    <OPTION value="14">Pau</option>
    <OPTION value="15">Stade Français</option>
  </SELECT>
  <!--<input type="text" name="eq1" placeholder="1">--> 
  <br >
  <br >
  <h5>Equipe 2 (Int)</h5>
  <SELECT name="eq2" size="1">
    <OPTION value="1">Toulouse</option>
    <OPTION value="2">Clermont</option>
    <OPTION value="4">Agen</option>
    <OPTION value="5">Castres</option>
    <OPTION value="6">Lyon</option>
    <OPTION value="7">Bordeaux</option>
    <OPTION value="8">Racing 92</option>
    <OPTION value="9">Toulon</option>
    <OPTION value="10">La Rochelle</option>
    <OPTION value="11">Montpellier</option>
    <OPTION value="12">Bayonne</option>
    <OPTION value="13">Brive</option>
    <OPTION value="14">Pau</option>
    <OPTION value="15">Stade Français</option>
  </select>
  <!--<input type="text" name="eq2" placeholder="2">--> 
  <br >
  <br >
  <h5>Date du match (JJ-MM-AAAA)</h5>
  <input type="date" name="dateMatch" placeholder="2020-01-30">
  <br >
  <br >
  <h5>Résultat (1 ou 2 ou N)</h5>
    <SELECT name="resultat" size="4">
    <OPTION value="1">Equipe 1</option>
    <OPTION value="2">Equipe 2</option>
    <OPTION value="N">Nul</option>
    <OPTION value="Résultat à venir">Résultat à venir</option>
  </select>
  <!--<input type="text" name="resultat" placeholder="N">-->
  <br >
  <br >
  <input type="submit" name="submitinserdetails" value="Insérer">
</form>
<br>
<a class="myButton" href="../../indexAdmin.php?page=matchsadmin">Revenir à la page</a>
    </div>
</body>
</html>