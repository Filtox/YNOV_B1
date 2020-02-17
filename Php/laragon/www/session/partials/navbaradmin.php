<?php 
  require_once './includes/functionsAdmin.php'; 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php foreach(getPagesAdmin() as $navPage):
        $active = "";
        if($page == $navPage){
          $active = "active";
        }
        ?>
        <li class="nav-item <?= $active ?>">
          <a class="nav-link" href="../indexAdmin.php?page=<?= $navPage ?>"> <?= getTitle($navPage) ?> <span class="sr-only">(current)</span></a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</nav>