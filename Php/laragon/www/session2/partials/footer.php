<footer>
  <?= getAndIncrementCompteur() ?>
</footer>
<!--
<?php
$_SESSION['historique'][]=$retour; //on enregistre dans la session
for($i=0;$i<(count($_SESSION['historique'])-11);$i++) //efface les plus anciens tout en gardant une référence dans le tableau
    $_SESSION['historique'][$i]='';
 
if(count($_SESSION['historique'])>0){
for($i=(count($_SESSION['historique'])-11);$i<(count($_SESSION['historique'])-1);$i++)//on parcourt les dix derniers
 
     echo $_SESSION['historique'][$i].'<br>'; 
 
}
?>
-->