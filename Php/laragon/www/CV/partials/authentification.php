<?php
include 'header.php';
include 'cv_data.php';
echo '<br> <br> <br>';
echo '<h1>Authentification</h1>';
echo '<img style="width : 25%; position : relative;"  src="uploads/avatar.jpg" alt=""';
echo '<br> <br> <br>';
?>
<form action="admin.php" method="post">
<p>Identification : <br />
Login : <input type="text" name="user"/><br />
Mot de passe : <input type="password" name="password"/><br />
<input type="submit" value="Envoyer"/>
<?php
include 'footer.php';
?>