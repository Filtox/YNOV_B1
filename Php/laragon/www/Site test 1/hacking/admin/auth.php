<?
 
    // auth.php - Authentification des admins Bases Hacking
 
    $login = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
 
    if ($login != "" && $mdp != "") {
 
        @mysql_connect("localhost", "root", "") or die("Impossible de se connecter à la base de données");
        @mysql_select_db("users") or die("Table inexistante");
 
        $resultat = mysql_numrows(mysql_query("SELECT * from admin WHERE pseudo='$login' AND mdp='$mdp';"));
 
        mysql_close();
 
        if ($resultat == 1) echo 'Authentification réussie, vous allez être redirigés immédiatement. <script>window.location="../hacking/admin/admin.php"</script>';
        else header("Location: ../hacking/admin//index.php");
    } else header("Location: ../hacking/admin/index.php");
 
 
?>