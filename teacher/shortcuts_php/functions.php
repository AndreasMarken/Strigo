<?php

function emptyInputSignup($navn, $email, $brukernavn, $passord, $pwdrepeat) {
  $resultat;
  if (empty($navn) || empty($email) || empty($brukernavn) || empty($passord) || empty($pwdrepeat)) {
        $resultat = true;
     }
     else {
       $resultat = false;
     }
     return $resultat;
}

function invalidUid($brukernavn) {
  $resultat;
  if (!preg_match("/^[a-åA-Å0-9]*$/", $brukernavn)) {
        $resultat = true;
     }
     else {
       $resultat = false;
     }
     return $resultat;
}

function invalidEmail($email) {
  $resultat;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $resultat = true;
     }
     else {
       $resultat = false;
     }
     return $resultat;
}

function pwdMatch($passord, $pwdrepeat) {
  $resultat;
  if ($passord !== $pwdrepeat) {
        $resultat = true;
     }
     else {
       $resultat = false;
     }
     return $resultat;
}

function uidExist($kobling, $brukernavn, $email) {
  $sql = "SELECT * FROM teacher WHERE username = ? OR email = ?;";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../PHP/teacherregister.php?error=stmtfailed");
    exit();
  }

 mysqli_stmt_bind_param($stmt, "ss", $brukernavn, $email);
 mysqli_stmt_execute($stmt);

 $resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  $result = false;
  return $result;
}

mysqli_stmt_close($stmt);

}

function createUser($kobling, $brukernavn, $email, $navn, $passord) {
  $sql2 = "INSERT INTO teacher (username, email, name, password) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: ../PHP/teacherregister.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($passord, PASSWORD_DEFAULT);

 mysqli_stmt_bind_param($stmt, "ssss", $brukernavn, $email, $navn, $hashedPwd);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 $sql3 = "INSERT INTO teacher_profilepicture (teacher_id, status) VALUES (LAST_INSERT_ID(),0);";
 $resultat = $kobling->query($sql3);

 header("location: ../PHP/teacherregister.php?error=none");
 exit();
}

function emptyInputLogin($brukernavn, $pwd) {
  $resultat;
  if (empty($brukernavn) || empty($pwd)) {
        $resultat = true;
     }
     else {
       $resultat = false;
     }
     return $resultat;
}

function loginUser($kobling, $brukernavn, $pwd){
  $uidExists = uidExist($kobling, $brukernavn, $brukernavn);

  if ($uidExists === false) {
    header("location: ../PHP/teacherlogin.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["password"];
  $checkPwd = password_verify($pwd,$pwdHashed);

  if ($checkPwd === false) {
    header("location: ../PHP/teacherlogin.php?error=wronglogin");
    exit();
  }
  elseif ($checkPwd === true) {
    session_start();
    $_SESSION["brukerID"] = $uidExists["idTeacher"];
    $_SESSION["brukernavn"] = $uidExists["username"];
    header("location: ../PHP/teacherloggedin.php");
    exit();
  }
}








 ?>
