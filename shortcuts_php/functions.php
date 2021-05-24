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
  $sql = "SELECT * FROM student WHERE brukernavn = ? OR email = ?;";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../pages/registrer.php?error=stmtfailed");
    exit();
  }

 mysqli_stmt_bind_param($stmt, "ss", $brukernavn, $email);
 mysqli_stmt_execute($stmt);

 $resultData = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultData)) {
  return $row;
}
else {
  // $result = false;
  // return $result;
  $sql = "SELECT * FROM teacher WHERE username = ? OR email = ?;";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../pages/registrer.php?error=stmtfailed");
    exit();
  }

 mysqli_stmt_bind_param($stmt, "ss", $brukernavn, $email);
 mysqli_stmt_execute($stmt);

 $resultData2 = mysqli_stmt_get_result($stmt);

if ($row2 = mysqli_fetch_assoc($resultData2)) {
  return $row2;
}
else {
  $result = false;
  return $result;
}

mysqli_stmt_close($stmt);
}

mysqli_stmt_close($stmt);

}

// function uidExist_teacher($kobling, $brukernavn, $email) {
//   $sql = "SELECT * FROM teacher WHERE username = ? OR email = ?;";
//   $stmt = mysqli_stmt_init($kobling);
//   if (!mysqli_stmt_prepare($stmt, $sql)) {
//     header("location: ../pages/registrer.php?error=stmtfailed");
//     exit();
//   }

//  mysqli_stmt_bind_param($stmt, "ss", $brukernavn, $email);
//  mysqli_stmt_execute($stmt);

//  $resultData = mysqli_stmt_get_result($stmt);

// if ($row = mysqli_fetch_assoc($resultData)) {
//   return $row;
// }
// else {
//   $result = false;
//   return $result;
// }

// mysqli_stmt_close($stmt);

// }

function loginUser($kobling, $brukernavn, $pwd){
  $uidExists = uidExist($kobling, $brukernavn, $brukernavn);

  if ($uidExists === false) {
    header("location: ../pages/login.php?error=wronglogin");
    exit();
  }

    $pwdHashed = $uidExists["passord"];
    $checkPwd = password_verify($pwd,$pwdHashed);

  if ($checkPwd === false) {
    header("location: ../pages/login.php?error=wronglogin");
    exit();
  }
  elseif ($checkPwd === true) {
    if ($uidExists["brukerID"]) {
      session_start();
      $_SESSION["brukerID"] = $uidExists["brukerID"];
      $_SESSION["brukernavn"] = $uidExists["brukernavn"];
      header("location: ../pages/hovedside_innlogget.php");
      exit();
    } elseif ($uidExists["idTeacher"]) {
      session_start();
      $_SESSION["TeacherID"] = $uidExists["idTeacher"];
      $_SESSION["brukernavn"] = $uidExists["username"];
      header("location: ../pages/teacherloggedin.php");
      exit(); 
    }
  } 
  }

// function loginUser_teacher($kobling, $brukernavn, $pwd){
//   $uidExists = uidExist_teacher($kobling, $brukernavn, $brukernavn);

//   if ($uidExists === false) {
//     header("location: ../pages/login.php?error=wronglogin");
//     exit();
//   }

//   $pwdHashed = $uidExists["password"];
//   $checkPwd = password_verify($pwd,$pwdHashed);

//   if ($checkPwd === false) {
//     header("location: ../pages/login.php?error=wronglogin");
//     exit();
//   }
//   elseif ($checkPwd === true) {
//     session_start();
//     $_SESSION["TeacherID"] = $uidExists["idTeacher"];
//     $_SESSION["brukernavn"] = $uidExists["username"];
//     header("location: ../pages/teacherloggedin.php");
//     exit();
//   }
// }

function createUser($kobling, $navn, $email, $brukernavn, $passord) {
  $sql2 = "INSERT INTO student (navn, email, brukernavn, passord) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: ../pages/registrer.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($passord, PASSWORD_DEFAULT);

 mysqli_stmt_bind_param($stmt, "ssss", $navn, $email, $brukernavn, $hashedPwd);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 $sql3 = "INSERT INTO profilbilde (userID, status) VALUES (LAST_INSERT_ID(),0);";
 $resultat = $kobling->query($sql3);
 loginUser($kobling, $brukernavn, $passord);
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

function createUser_teacher($kobling, $brukernavn, $email, $navn, $passord) {
  $sql2 = "INSERT INTO teacher (username, email, name, password) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($kobling);
  if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: ../pages/teacherregister.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($passord, PASSWORD_DEFAULT);

 mysqli_stmt_bind_param($stmt, "ssss", $brukernavn, $email, $navn, $hashedPwd);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 $sql3 = "INSERT INTO teacher_profilepicture (teacher_id, status) VALUES (LAST_INSERT_ID(),0);";
 $resultat = $kobling->query($sql3);
 loginUser($kobling, $brukernavn, $passord);
 exit();
}

function checkKeys($kobling, $randStr) {
  $sql = "SELECT * FROM SchoolCode";
  $result = $kobling->query($sql);

    if (!$result) {
      die("Noe gikk galt med spørringen: " . $kobling->error);
    }

    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['school_code'] == $randStr) {
        $keyExists = true;
        break;
      } else {
        $keyExists = false;
      }
    }

    return $keyExists;
  }

  function generateKey($kobling) {
    $keyLength = 8;
    $str = "abcdefghijklmnopqrstuvwxyz123456789";
    $randStr = substr(str_shuffle($str), 0, $keyLength);

    $checkKey = checkKeys($kobling, $randStr);

    while($checkKey == true) {
      $randStr = substr(str_shuffle($str), 0, $keyLength);
      $checkKey = checkKeys($kobling, $randStr);
    }

    return $randStr;
  }
 
  function emptyInputOption($StudentTeacher) {
    $resultat;
    if (empty($StudentTeacher)) {
          $resultat = true;
       }
       else {
         $resultat = false;
       }
       return $resultat;
  }
  



 ?>
