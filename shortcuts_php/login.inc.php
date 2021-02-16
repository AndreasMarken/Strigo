<<?php

if (isset($_POST["submit"])) {

  $brukernavn = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'kobling.php';
  require_once 'functions.php';

  if (emptyInputLogin($brukernavn, $pwd) !== false) {
    header("location: ../PHP/login.php?error=emptyinput");
    exit();
  }

  loginUser($kobling, $brukernavn, $pwd);
}
else {
  header("location: ../PHP/login.php");
  exit();
}











 ?>
