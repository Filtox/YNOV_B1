<!--
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
    <?= recupereBaseDonneesPresentation() ?>
</body>
</html>
-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
    /*
		$mysqli = new mysqli('localhost', 'root', '', 'sitecvphp');
		$mysqli->set_charset("utf8");
		$requete = 'SELECT * FROM presentation';
		$resultat = $mysqli->query($requete);
		while ($ligne = $resultat->fetch_assoc()) {
			echo $ligne['firstname'].' '.$ligne['lastname'].' '.$ligne['age'].' ';
			echo $ligne['adresse'].' '.$ligne['ville'].' '.$ligne['mail'].' '.$ligne['phone'].' '.$ligne['permis'].'<br>';
		}
		$mysqli->close();
		*/
        
        
        $mysqli = new mysqli('192.20.27.12', 'root', 'HaLo1Bt', 'db_forum');

if ($mysqli->connect_errno) {
  die('<p>Connexion impossible : '.$mysqli->connect_error.'</p>');
}

$result = $mysqli->query('SELECT nom, prenom FROM users;') ;

if (!$result) {
  die('<p>ERREUR Requête invalide : '.$mysqli->error.'</p>');
}

while ($row = $result->fetch_assoc()) {
  $nom = $row['nom'] ;
  $prenom = $row['prenom'] ;
  echo '<p>'.$prenom.' '.$nom.'</p>'."\r\n" ;
}

$result->free() ;

$mysqli->close() ;

        ?>
        
	</body> 
</html>