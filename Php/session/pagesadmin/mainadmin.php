<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php
include( "editpres/display.php" );
?>
<!-- <?= recupereBaseDonneesPresentation() ?>  -->
<br>
<a class="myButton" href="../pagesadmin/editpres/insertdeleteedit.php">Ajouter</a><a class="myButtondeco" href="../index.php">Se déconnecter</a><br>
<br>
    <img style="width: 30%; height: auto;" alt="profil" src="../images/actual/profil.jpg"><br><br>
    <hr style="height: 1px; background-color: black; margin-bottom: 3rem; margin-top: 1rem;">
    <p>Changement d'image</p>
<form action="indexAdmin.php?page=mainadmin" method="post" enctype="multipart/form-data">
  <input type="file" name="monfichier" value="Photo Présentation" />
  <input type="submit" value="Envoyer" />
</form>
    <hr style="height: 1px; background-color: black; margin-bottom: 3rem; margin-top: 3rem;">
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if ( isset( $_FILES[ 'monfichier' ] )AND $_FILES[ 'monfichier' ][ 'error' ] == 0 ) {
  // Testons si le fichier n'est pas trop gros
  if ( $_FILES[ 'monfichier' ][ 'size' ] <= 1000000 ) {
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo( $_FILES[ 'monfichier' ][ 'name' ] );
    $extension_upload = $infosfichier[ 'extension' ];
    $extensions_autorisees = array( 'jpg', 'jpeg', 'gif', 'png' );
    if ( in_array( $extension_upload, $extensions_autorisees ) ) {
      // On peut valider le fichier et le stocker définitivement
      // le dossier uploads doit exister
      move_uploaded_file( $_FILES[ 'monfichier' ][ 'tmp_name' ], 'images/actual/' . basename( $_FILES[ 'monfichier' ][ 'name' ] ) );
      echo "L'envoi a bien été effectué !";
    }
  }
}
?>
</body>
</html>