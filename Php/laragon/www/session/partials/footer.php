<footer>
<p>Compteur de visites :</p>  <?= getAndIncrementCompteur() ?>
    <br>
    <br>
    <?=
    $actual_link1 = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    ?>
</footer>