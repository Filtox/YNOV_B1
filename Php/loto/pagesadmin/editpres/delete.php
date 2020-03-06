<?php
include( "db.php" );
$getid = $_GET[ 'deleteid' ];
$sel = "DELETE FROM `equipe` WHERE `id` = '$getid'";
$qry = mysqli_query( $connect, $sel );
if ( $qry ) {
  header( "location: ../../indexAdmin.php?page=mainadmin" );
}
?>