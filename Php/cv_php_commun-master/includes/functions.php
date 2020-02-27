<?php  

require 'includes/data.php';

function getTitle($page){
    global $pagesTitles;
    return $pagesTitles[$page];
}

function getBody($page){
    include "pages/$page.php";
    //return "getBody : $page";
}

function getFooter($page){
    include 'partials/footer.php';
    //return "getFooter : $page";
}

function getPages(){
    global $pagesTitles;
    return array_keys($pagesTitles);   
}

function getMultipleArray($elements, $class){
    $ret = ""; 
    $ret.= "<div class='$class'>";
    foreach($elements as $element){
        $ret.= "<ul class='$class'>";
        foreach($element as $k => $v){
            $ret.= "<li>";
           $ret.= "<span class='marray_label'>$k</span>";
           $ret.= "&nbsp;<span class='marray_value'>$v</span>";
           $ret.= "</li>";
        }
        $ret.= "</ul>";
    }
    $ret.= "</div>";
    return $ret;
}

?>