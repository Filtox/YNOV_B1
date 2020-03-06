<?php

require 'dataadmin.php';

function getTitle( $page ) {
  global $pagesTitlesAdmin;
  return $pagesTitlesAdmin[ $page ];
}

function getBody( $page ) {
  include "./pagesadmin/$page.php";
  //return "getBody : $page";
}

function getPagesAdmin() {
  global $pagesTitlesAdmin;
  return array_keys( $pagesTitlesAdmin );
}

function getMultipleArray( $elements, $class ) {
  $ret = "";
  $ret .= "<div class='$class'>";
  foreach ( $elements as $element ) {
    $ret .= "<ul class='$class'>";
    foreach ( $element as $k => $v ) {
      $ret .= "<li>";
      $ret .= "<span class='marray_label'>$k</span>";
      $ret .= "&nbsp;<span class='marray_value'>$v</span>";
      $ret .= "</li>";
    }
    $ret .= "</ul>";
  }
  $ret .= "</div>";
  return $ret;
}
?>