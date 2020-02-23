<?php include 'includes/data.php' ?>
<!doctype html>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
include( "editloisirs/display.php" );
?>
    <br>
<a class="myButton" href="../pagesadmin/editloisirs/insertdeleteedit.php">Ajouter</a>
    <!--
<?=	recupereBaseDonneesLoisirs() ?> -->
<!--
	<ul>
  <?php foreach($loisirs as $l): ?>
  <li> <span class="loisirs_label">
    <?= $l ?>
    </span> </li>
  <?php endforeach ?>
</ul>
-->
</body>
</html>