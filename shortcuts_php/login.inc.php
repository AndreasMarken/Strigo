<?php
session_start();

if (isset($_POST["submit"])) {

  $_SESSION["uid"] = $_POST["uid"];

  $brukernavn = $_SESSION["uid"];
  $pwd = $_POST["pwd"];

  require_once 'kobling.php';
  require_once 'functions.php';

  if (emptyInputLogin($brukernavn, $pwd) !== false) {
    header("location: ../pages/login.php?error=emptyinput");
    exit();
  }

  loginUser($kobling, $brukernavn, $pwd);
}
else {
  header("location: ../pages/login.php");
  exit();
}











 ?>
