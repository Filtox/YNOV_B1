<?php

require 'includes/cv_data.php'

function getTitle($page){
    global $pageTitles;
    return $pageTitles[$page];
}


function getBody($page){
    return "getBody : $page";
}


function getFooter($page){
    return "getFooter : $page";
}

function getPages(){
    global $pageTitles;
    return array_keys($pageTitles);
}

?>