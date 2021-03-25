<<?php

if (isset($_POST["submit"])) {

  $brukernavn = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'kobling.php';
  require_once 'functions.php';

  if (emptyInputLogin($brukernavn, $pwd) !== false) {
    header("location: ../PHP/teacherlogin.php?error=emptyinput");
    exit();
  }

  loginUser($kobling, $brukernavn, $pwd);
}
else {
  header("location: ../PHP/teacherlogin.php");
  exit();
}

 ?>
