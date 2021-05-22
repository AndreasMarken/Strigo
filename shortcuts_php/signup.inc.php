<?php

if (isset($_POST["submit"])) {

  $StudentTeacher = $_POST["StudentTeacher"];

  $navn = $_POST["navn"];
  $email = $_POST["email"];
  $brukernavn = $_POST["uid"];
  $passord = $_POST["pwd"];
  $pwdrepeat = $_POST["pwdrepeat"];

  require_once 'kobling.php';
  require_once 'functions.php';

  if (emptyInputSignup($navn, $email, $brukernavn, $passord, $pwdrepeat) !== false) {
    header("location: ../pages/registrer.php?error=emptyinput");
    exit();
  }
  if (invalidUid($brukernavn) !== false) {
    header("location: ../pages/registrer.php?error=invaliduid");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../pages/registrer.php?error=invalidemail");
    exit();
  }
  if (pwdMatch($passord, $pwdrepeat) !== false) {
    header("location: ../pages/registrer.php?error=passwordsdontmatch");
    exit();
  }
  if (uidExist($kobling, $brukernavn, $email) !== false) {
    header("location: ../pages/registrer.php?error=usernametaken");
    exit();
  }
  // if (uidExist_teacher($kobling, $brukernavn, $email) !== false) {
  //     header("location: ../pages/registrer.php?error=usernametaken");
  //     exit();
  //   }
  if (emptyInputOption($StudentTeacher) !== false) {
    header("location: ../pages/registrer.php?error=emptyinput");
    exit();
  }

  if($StudentTeacher == 'student'){
      createUser($kobling, $navn, $email, $brukernavn, $passord);
    }

  if($StudentTeacher == 'teacher'){
     createUser_teacher($kobling, $brukernavn, $email, $navn, $passord);
    }
  } else {
    header("location: ../pages/registrer.php");
    exit();
  }


 ?>
