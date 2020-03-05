<?php

spl_autoload_register(function ($c) {
    include 'classes/' . $c . '.php';
});

?>