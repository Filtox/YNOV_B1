<?
 
    //admin.php - Bases Hacking Administration Panel
 
    $headers = http_get_request_headers(); //On récupère les headers et on vérifie que l'user est passé par auth.php
 
    if (!isset($headers["Referer"]) || $headers["Referer"] != "http://".$headers["Host"]."/hacking/admin/auth.php")
        header("Location: ./");
 
?>
 
<html>
 
<head>
 
    <div align="center"><h1>Bases Hacking Administration Zone</h1></div>
    <title>Faille de type SQL Injection et Referrer Spoofing</title>
 
</head>
 
<body>
 
    <img src="../images/halo-infinite-halo-6.jpg">
    <br><br>
    [Message d'accueil]
 
</body>
</html>