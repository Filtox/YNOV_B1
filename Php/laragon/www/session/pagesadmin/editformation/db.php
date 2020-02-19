<?php
$connect = mysqli_connect( "localhost", "root", "" );

if ( $connect ) {
  echo "<br/> Connected to server";
} else {
  die( "<br />Connection error " . mysqli_connect_error() );
}

$selectdb = mysqli_select_db( $connect, "sitecvphp" );
if ( $selectdb ) {
  echo "<br />Existing Database Selected";
  echo "<br />Created database selected";
  $sqlcreatetable = "
CREATE TABLE IF NOT EXISTS `presentation` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`firstname` varchar(100) NOT NULL,
`lastname` varchar(100) NOT NULL,
`age` varchar(100) NOT NULL,
`adresse` varchar(100) NOT NULL,
`ville` varchar(100) NOT NULL,
`mail` varchar(100) NOT NULL,
`phone` varchar(100) NOT NULL,
`permis` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
  if ( mysqli_query( $connect, $sqlcreatetable ) ) {
    echo "<br />New table created";
  } else {
    echo "<br />No table created";
  }

} else {
  $sqlcreatedb = "CREATE DATABASE IF NOT EXISTS `sitecvphp`";
  if ( mysqli_query( $connect, $sqlcreatedb ) ) {
    echo "<br />New database created";
    $selectdb2 = mysqli_select_db( $connect, "sitecvphp" );
    if ( $selectdb2 ) {
      echo "<br />Created database selected";
      $sqlcreatetable = "
CREATE TABLE IF NOT EXISTS `presentation` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`firstname` varchar(100) NOT NULL,
`lastname` varchar(100) NOT NULL,
`age` varchar(100) NOT NULL,
`adresse` varchar(100) NOT NULL,
`ville` varchar(100) NOT NULL,
`mail` varchar(100) NOT NULL,
`phone` varchar(100) NOT NULL,
`permis` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
";
      if ( mysqli_query( $connect, $sqlcreatetable ) ) {
        echo "<br />New table created";
      } else {
        echo "<br />No table created";
      }
    }

  } else {
    echo "<br />No database created";
  }
}

?>