<?php
$tjener = "localhost";
$brukernavndb = "root";
$passorddb = "root";
$database = "Strigo";
$kobling = new mysqli ($tjener, $brukernavndb, $passorddb, $database);

if ($kobling->connect_error) {
  die("Noe gikk galt med koblingen:" . $kobling->connect_error);
}

?>