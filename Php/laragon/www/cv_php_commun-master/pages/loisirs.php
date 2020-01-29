<?php include 'includes/data.php' ?>
<ul>
<?php foreach($loisirs as $l): ?>
    <li>
        <span class="loisirs_label"><?= $l ?></span>
    </li>
<?php endforeach ?>
</ul>