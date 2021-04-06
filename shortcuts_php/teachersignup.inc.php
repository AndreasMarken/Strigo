<?php

if (isset($_POST["submit"])) {

  $navn = $_POST["navn"];
  $email = $_POST["email"];
  $brukernavn = $_POST["uid"];
  $passord = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];

  require_once 'kobling.php';
  require_once 'functions.php';

  if (emptyInputSignup($navn, $email, $brukernavn, $passord, $pwdrepeat) !== false) {
    header("location: ../pages/teacherregister.php?error=emptyinput");
    exit();
  }
  if (invalidUid($brukernavn) !== false) {
    header("location: ../pages/teacherregister.php?error=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../pages/teacherregister.php?error=invalidemail");
    exit();
  }
  if (pwdMatch($passord, $pwdrepeat) !== false) {
    header("location: ../pages/teacherregister.php?error=passwordsdontmatch");
    exit();
  }
  if (uidExist_teacher($kobling, $brukernavn, $email) !== false) {
      header("location: ../pages/teacherregister.php?error=usernametaken");
      exit();
    }


  createUser_teacher($kobling, $brukernavn, $email, $navn, $passord);

}
else {
  header("location: ../pages/teacherregister.php");
  exit();
}


 ?>
