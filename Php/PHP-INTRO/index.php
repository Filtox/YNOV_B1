<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP</title>
  <style>
  body {
    margin: 0;
    padding: 0;
    width: 100vw;
    height: 100vh;
    background-color: #000;
    color: #fff;
    font-family: sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  </style>
</head>
<body>
  <?php
  date_default_timezone_set("Europe/Paris");
    $hello = "Hello ";
    $world = Array(
      "W",
      "o",
      "r",
      "l",
      "d",
      "!"
    );
    echo ("<h1>" . $hello);
    for($i=0; $i<=count($world)-1; $i++){
      echo $world[$i];
    }
    echo  "</h1>";
    
    $ma_variable = 10;
    echo $ma_variable;
    echo ("<h3>" . "ma variable vaut $ma_variable" . "</h3>");
    echo 'ma variable vaut $ma_variable';
  ?>
  <p><?= $ma_variable ?></p>
  <?php
   $x = 4; //On affecte la valeur 4 à $x
   $y = 2; //On affecte la valeur 2 à $y
?> 
<?php if ($x > 1) :?>
   <p>$x contient une valeur stric. supérieure à 1</p>
<?php else : ?>
   <p>$x contient une valeur inférieure ou égale à 1</p>
<?php endif; ?>

<?php
$coordonnees['prenom'] = 'François';
$coordonnees['nom'] = 'Dupont';
$coordonnees['adresse'] = '3 Rue du Paradis';
$coordonnees['ville'] = 'Marseille' . ' ' . 'Paris';
?>
<?php
echo $coordonnees['ville'];
?>

<?php
echo"<br> <br>"
?>
<?php
$coord = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

foreach($coord as $cle => $element)
{
    echo '[' . $cle . '] vaut ' . $element . '<br />';
}
?>


<?php
$test1 = [
    'prenom' => 'Pierre', 'nom' => 'Da Silva'
];
?>


<?php
echo"<br><br><br>";
   function bonjour($prenom, $role='abonné(e)'){
       echo 'Bonjour ' .$prenom. ' vous êtes un(e) ' .$role. '.<br>';
   }
  
   bonjour('Mathilde');
   bonjour('Pierre', 'administrateur');
?>

</body>
</html>

