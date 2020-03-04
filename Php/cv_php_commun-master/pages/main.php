<?php include 'includes/data.php' ?>
<ul>
<?php foreach($coordonnees as $k => $v): ?>
    <li>
        <span class="coords_label"><?= $k ?></span>
        <span class="coords_value"><?= $v ?></span>
    </li>
<?php endforeach ?>
</ul>