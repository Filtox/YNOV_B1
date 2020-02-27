<?php

require 'dataadmin.php';

function getTitle( $page ) {
  global $pagesTitlesAdmin;
  return $pagesTitlesAdmin[ $page ];
}

function getBody( $page ) {
  include "./pagesadmin/$page.php";
  //return "getBody : $page";
}

function getFooter( $page ) {
  include './partials/footer.php';
  //return "getFooter : $page";
}

function getPagesAdmin() {
  global $pagesTitlesAdmin;
  return array_keys( $pagesTitlesAdmin );
}

function getMultipleArray( $elements, $class ) {
  $ret = "";
  $ret .= "<div class='$class'>";
  foreach ( $elements as $element ) {
    $ret .= "<ul class='$class'>";
    foreach ( $element as $k => $v ) {
      $ret .= "<li>";
      $ret .= "<span class='marray_label'>$k</span>";
      $ret .= "&nbsp;<span class='marray_value'>$v</span>";
      $ret .= "</li>";
    }
    $ret .= "</ul>";
  }
  $ret .= "</div>";
  return $ret;
}

function getAndIncrementCompteur() {
  if ( !file_exists( "./data/compteur.txt" ) ) {
    file_put_contents( "./data/compteur.txt", "0" );
  }
  $content = file_get_contents( "./data/compteur.txt" );
  $content++;
  file_put_contents( "./data/compteur.txt", $content );
  return $content;
}

/*
function recupereBaseDonneesPres() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }
  $reponse = $bdd->query( 'SELECT * FROM presentation' );
  while ( $donnees = $reponse->fetch() ) {
    echo $donnees[ 'firstname' ] . '  ' . $donnees[ 'lastname' ] . ' , ' . $donnees[ 'age' ] . ',  ' . $donnees[ 'adresse' ] . ',  ' . $donnees[ 'ville' ] . ',  ' . $donnees[ 'mail' ] . ' , ' . $donnees[ 'phone' ] . ' , ' . $donnees[ 'permis' ] . '<br />';
  }
  $reponse->closeCursor();
}
*/
// PRESENTATION
function recupereBaseDonneesPresentation() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }

  $reponse = $bdd->query( 'SELECT firstname, lastname, age, adresse, ville, mail, phone, permis FROM presentation' );

  echo '<table border="1">';

  echo '<th>';
  echo '<td>' . 'Prénom' . '</td>';
  echo '<td>' . 'Nom' . '</td>';
  echo '<td>' . 'Age' . '</td>';
  echo '<td>' . 'Adresse' . '</td>';
  echo '<td>' . 'Ville' . '</td>';
  echo '<td>' . 'E-mail' . '</td>';
  echo '<td>' . 'Téléphone' . '</td>';
  echo '<td>' . 'Permis' . '</td>';
  echo '</th>';

  while ( $donnees = $reponse->fetch( PDO::FETCH_ASSOC ) ) { //PDO::FETCH_ASSOC évite les doublons
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field ) {
      echo '<td>' . $field . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse->closeCursor();
}
    
// EXPERIENCES
function recupereBaseDonneesExperiences() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }

  $reponse = $bdd->query( 'SELECT poste, entreprise, lieu, annee, mois, description FROM experiences' );

  echo '<table border="1">';

  echo '<th>';
  echo '<td>' . 'Poste' . '</td>';
  echo '<td>' . 'Entreprise' . '</td>';
  echo '<td>' . 'Lieu' . '</td>';
  echo '<td>' . 'Année' . '</td>';
  echo '<td>' . 'Mois' . '</td>';
  echo '<td>' . 'Descritpion' . '</td>';
  echo '</th>';

  while ( $donnees = $reponse->fetch( PDO::FETCH_ASSOC ) ) { //PDO::FETCH_ASSOC évite les doublons
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field ) {
      echo '<td>' . $field . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse->closeCursor();
}

// FORMATION
function recupereBaseDonneesFormation() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }

  $reponse = $bdd->query( 'SELECT diplome, option, annee, etablissement, lieu FROM formation' );

  echo '<table border="1">';

  echo '<th>';
  echo '<td>' . 'Diplome' . '</td>';
  echo '<td>' . 'Option' . '</td>';
  echo '<td>' . 'Annee' . '</td>';
  echo '<td>' . 'Etablissement' . '</td>';
  echo '<td>' . 'Lieu' . '</td>';
  echo '</th>';

  while ( $donnees = $reponse->fetch( PDO::FETCH_ASSOC ) ) { //PDO::FETCH_ASSOC évite les doublons
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field ) {
      echo '<td>' . $field . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse->closeCursor();
}

// LOISIRS
function recupereBaseDonneesLoisirs() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }

  $reponse = $bdd->query( 'SELECT loisirs FROM loisirs' );

  echo '<table border="1">';

  echo '<th>';
  echo '<td>' . 'Loisirs' . '</td>';
  echo '</th>';

  while ( $donnees = $reponse->fetch( PDO::FETCH_ASSOC ) ) { //PDO::FETCH_ASSOC évite les doublons
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field ) {
      echo '<td>' . $field . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse->closeCursor();
}

?>