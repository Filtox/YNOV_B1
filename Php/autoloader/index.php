<?php
include "autoloader.php";


try {

    $c = new maclasse("toto");

  } catch (Exception $e) {

    echo $e->getMessage();

  }
?>