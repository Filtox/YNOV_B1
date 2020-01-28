<!-- Mettre session start -->

<?php

echo '<button type="button"><a  href="exppro.php">exp pro</a></button>';
echo '<button type="button"><a  href="scolaire.php">scolaire</a></button>';
echo '<button type="button"><a  href="authnetification.php">authentification</a></button>';
echo '<button type="button"><a  href="presentation.php">presentation</a></button>';
echo '<button type="button"><a  href="loisirs.php">loisirs</a></button>';

session_start();

$_SESSION['prenom'] = 'Pierre';
$_SESSION['nom'] = 'Da Silva';
$_SESSION['age'] = '21';

?>
<p>Bonjour <?=$_SESSION['prenom']?>