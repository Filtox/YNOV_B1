<?php

require 'includes/data.php';

function getTitle( $page ) {
  global $pagesTitles;
  return $pagesTitles[ $page ];
}

function getBody( $page ) {
  include "pages/$page.php";
  //return "getBody : $page";
}

function getFooter( $page ) {
  include 'partials/footer.php';
  //return "getFooter : $page";
}

function getPages() {
  global $pagesTitles;
  return array_keys( $pagesTitles );
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
  if ( !file_exists( "data/compteur.txt" ) ) {
    file_put_contents( "data/compteur.txt", "0" );
  }
  $content = file_get_contents( "data/compteur.txt" );
  $content++;
  file_put_contents( "data/compteur.txt", $content );
  return $content;
}

/*
function recupereBaseDonnees() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }
  $reponse = $bdd->query( 'SELECT * FROM presentation' );
  while ( $donnees = $reponse->fetch() ) {
    echo $donnees[ 'prenom' ] . '  ' . $donnees[ 'nom' ] . ' , ' . $donnees[ 'age' ] . ',  ' . $donnees[ 'adresse' ] . ',  ' . $donnees[ 'ville' ] . ',  ' . $donnees[ 'mail' ] . ' , ' . $donnees[ 'telephone' ] . ' , ' . $donnees[ 'permis' ] . '<br />';
  }
  $reponse->closeCursor();
}
*/
    
function recupereBaseDonnees1() {
  try {
    $bdd = new PDO( 'mysql:host=localhost;dbname=sitecvphp;charset=utf8', 'root', '' );
  } catch ( Exception $e ) {
    die( 'Erreur : ' . $e->getMessage() );
  }

  $reponse = $bdd->query( 'SELECT prenom, nom, age, adresse, ville, mail, telephone, permis FROM presentation' );
  $reponse1 = $bdd->query( 'SELECT poste, entreprise FROM experiences' );

  echo '<table border="1">';

  echo '<th>';
  echo '<td>' . 'prenom' . '</td>';
  echo '<td>' . 'nom' . '</td>';
  echo '<td>' . 'age' . '</td>';
  echo '<td>' . 'adresse' . '</td>';
  echo '<td>' . 'ville' . '</td>';
  echo '<td>' . 'mail' . '</td>';
  echo '<td>' . 'telephone' . '</td>';
  echo '<td>' . 'permis' . '</td>';
  echo '</th>';

  while ( $donnees = $reponse->fetch( PDO::FETCH_ASSOC ) ) {
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field ) {
      echo '<td>' . $field . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse->closeCursor();
    
    while ( $donnees = $reponse1->fetch( PDO::FETCH_ASSOC ) ) {
    echo '<tr>';
    echo '<td></td>';
    foreach ( $donnees as $field1 ) {
      echo '<td>' . $field1 . '</td>';
    }
    echo '</tr>';
  }
  echo '</table>';
  $reponse1->closeCursor();
}

?>