<?php
/*if($_POST['user'] == 'pierre' AND $_POST['password'] == 'pi')
{
   echo"Vous etes au bon endroit";
}
else{
    echo "Wrong username or password";
}*/
echo '<form action="admin.php" method="post" enctype="multipart/form-data">
<p>
     		Formulaire d envoi de fichier :<br />
          <input type="file" name="monfichier" /><br />
          <input type="file" name="monfichier1" /><br />
          <input type="file" name="monfichier2" /><br />
          <input type="file" name="monfichier3" /><br />
          <input type="submit" value="Envoyer le fichier" />
     </p>
</form>';
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
      if ($_FILES['monfichier']['size'] <= 1000000)
      {
// Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['monfichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
            		// On peut valider le fichier et le stocker définitivement
			// le dossier uploads doit exister
                  move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                  echo "L'envoi a bien été effectué !";
                }
        }
}
if (isset($_FILES['monfichier1']) AND $_FILES['monfichier1']['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
      if ($_FILES['monfichier1']['size'] <= 1000000)
      {
// Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['monfichier1']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
            		// On peut valider le fichier et le stocker définitivement
			// le dossier uploads doit exister
                  move_uploaded_file($_FILES['monfichier1']['tmp_name'], 'uploads/' . basename($_FILES['monfichier1']['name']));
                  echo "L'envoi a bien été effectué !";
                }
        }
}
if (isset($_FILES['monfichier2']) AND $_FILES['monfichier2']['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
      if ($_FILES['monfichier2']['size'] <= 1000000)
      {
// Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['monfichier2']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
            		// On peut valider le fichier et le stocker définitivement
			// le dossier uploads doit exister
                  move_uploaded_file($_FILES['monfichier2']['tmp_name'], 'uploads/' . basename($_FILES['monfichier2']['name']));
                  echo "L'envoi a bien été effectué !";
                }
        }
}
if (isset($_FILES['monfichier3']) AND $_FILES['monfichier3']['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
      if ($_FILES['monfichier3']['size'] <= 1000000)
      {
// Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['monfichier3']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees))
            {
            		// On peut valider le fichier et le stocker définitivement
			// le dossier uploads doit exister
                  move_uploaded_file($_FILES['monfichier3']['tmp_name'], 'uploads/' . basename($_FILES['monfichier3']['name']));
                  echo "L'envoi a bien été effectué !";
                }
        }
}
?>